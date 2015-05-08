$(document).ready(function(){

  startTimer();

});

function startTimer() {
  setInterval(function(){
    var text = "It's been " + hoursSinceFirstVisit() + " hours since you first visited.";
    $('#timer').text(text);
  }, 1000);
}

function hoursSinceFirstVisit() {

  // use local storage to calculate the time elapsed between the user's first visit and now

}

/**
 * Calculates the number of hours between two dates to 3 decimal places
 * @param {Date|string} earlier The earlier date.
 * @param {Date|string} later   The later date.
 */
function hoursBetweenDates(earlier, later) {
  var later = typeof later == 'string' ? new Date(later) : later;
  var earlier = typeof earlier == 'string' ? new Date(earlier) : earlier;
  var elapsed = later - earlier;
  console.log(earlier, later, elapsed);
  return (elapsed / 1000 / 60 / 60).toFixed(3);
}
