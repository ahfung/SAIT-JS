<?php
/**
 * This file contains a basics tweets API
 * providing functions to create, retrieve and delete tweets,
 * as well as set up the underlying table.
 *
 * Be sure to either copy 'tweets.sqlite' or
 * create a new file of that name in the same directory as this file.
 *
 * @author Cameron Falkenhagen
 * @date	 2015-05-05
 */


/**
 * Get the database handle
 */
function getDb()
{
	$databaseName = 'tweets.sqlite';

	try {
	  $db = new PDO('sqlite:'.$databaseName);
	  $db->setAttribute(
	    PDO::ATTR_ERRMODE,
	    PDO::ERRMODE_EXCEPTION
	  );
		return $db;
	}
	catch(PDOException $e)
	{
	  print 'Exception : '.$e->getMessage();
	}
}


function dropDatabase()
{
	$db = getDb();
	$db->exec("DROP TABLE tweets");
}


/**
 * Setup up the database by
 * - creating a tweets table
 * - adding some default data
 */
function setupDatabase()
{

	$db = getDb();

	try
	{
	  //create the database
	  $db->exec("CREATE TABLE tweets (Id INTEGER PRIMARY KEY, tweet TEXT)");

	  //insert some data...
		$date = date('Y-m-d');
		saveTweet('Go Vote!');
		saveTweet('#voteorelse');
		saveTweet('Be happy');
	}
	catch(PDOException $e)
	{
	  print 'Exception : '.$e->getMessage();
	}

}


function saveTweet($tweet)
{
	try
	{
		// getDb()->exec("INSERT INTO tweets (tweet, complete, due_date) VALUES ('$tweet', $complete, '$due_date');");
		$stmt = getDb()->prepare("INSERT INTO tweets (tweet) VALUES (?);");
		$stmt->execute([$tweet]);
	}
	catch(PDOException $e)
	{
		print 'Exception : ' . $e->getMessage();
	}
}


function deleteTweet($id)
{
	try
	{
		getDb()->exec("DELETE FROM tweets WHERE Id=$id;");
	}
	catch(PDOException $e)
	{
		print 'Exception : ' . $e->getMessage();
	}
}


function getTweets()
{
	try
	{
	  $result = getDb()->query('SELECT * FROM tweets');
	}
	catch(PDOException $e)
	{
		print 'Exception : '.$e->getMessage();
	}

	return $result->fetchAll(PDO::FETCH_ASSOC);
}
