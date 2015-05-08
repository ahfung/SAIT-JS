$(document).ready(function(){

  submitTweets();
  displayTweets();
  removeTweets();

});

function displayTweets() {
  var tweets = retrieveTweetsFromLocalStorage();
  for(var i=0; i<tweets.length; i++) {
      appendTweet(i, tweets[i]);
  }
}

function appendTweet(index, tweet) {
  var $tweetList = $('#tweets');
  var tweet = $("<li id='"+index+"'>"+tweet+"<button class='btn btn-sm'>delete</button></li>");
  $tweetList.append(tweet);
}

function removeTweets() {
  $tweetList = $('#tweets');
  $tweetList.on('click', 'button', function(){
    var $li = $(this).closest('li');
    var id = $li.attr('id');
    var tweets = retrieveTweetsFromLocalStorage();
    tweets.splice(id,1);
    storeTweetsInLocalStorage(tweets);
    $li.remove();
    $tweetList.find('li').each(function(i,element){
      $(element).attr('id', i);
    });
  });
}

function submitTweets() {
  $('form').submit(function(event){
    event.preventDefault();

    var tweet = $('#tweet').val();

    console.log(tweet);

    var tweets = retrieveTweetsFromLocalStorage();
    appendTweet(tweets.length, tweet);
    tweets.push(tweet);
    storeTweetsInLocalStorage(tweets);

  });
}

function storeTweetsInLocalStorage(tweets) {
  localStorage.setItem('tweets', JSON.stringify(tweets));
}

function retrieveTweetsFromLocalStorage() {
  var data = localStorage.getItem('tweets');
  if( data == undefined ) {
    return [];
  } else {
    return JSON.parse(data);
  }
}

function deleteTweetsInLocalStorage() {
  return localStorage.removeItem('tweets');
}
