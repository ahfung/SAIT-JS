<?php

include 'tweetsDb.php'

switch( $_POST['action'] )
{
  case 'getTweets':
    echo json_encode( getTweets() );
    die;
  case 'saveTweet':
    saveTweet( $_POST['tweet'] );
    die;
  case 'deleteTweet':
    deleteTweet( $_POST['tweet_id'] );
    die;
}
