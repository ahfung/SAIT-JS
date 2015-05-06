<?php
/**
 * This file contains a basics tasks API
 * providing functions to create, retrieve and delete tasks,
 * as well as set up the underlying table.
 *
 * Be sure to either copy 'tasks.sqlite' or
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
	$databaseName = 'tasks.sqlite';

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
	$db->exec("DROP TABLE tasks");
}


/**
 * Setup up the database by
 * - creating a tasks table
 * - adding some default data
 */
function setupDatabase()
{

	$db = getDb();

	try
	{
	  //create the database
	  $db->exec("CREATE TABLE tasks (Id INTEGER PRIMARY KEY, task TEXT, complete INTEGER, due_date TEXT)");

	  //insert some data...
		$date = date('Y-m-d');
		saveTask('Get Milk', $date);
		saveTask('Get Bread', $date);
		saveTask('Get Butter', $date);
	}
	catch(PDOException $e)
	{
	  print 'Exception : '.$e->getMessage();
	}

}


function saveTask($task, $due_date, $complete=0)
{
	try
	{
		// getDb()->exec("INSERT INTO tasks (task, complete, due_date) VALUES ('$task', $complete, '$due_date');");
		$stmt = getDb()->prepare("INSERT INTO tasks (task, complete, due_date) VALUES (?, ?, ?);");
		$stmt->execute([$task, $complete, $due_date]);
	}
	catch(PDOException $e)
	{
		print 'Exception : ' . $e->getMessage();
	}
}


function deleteTask($id)
{
	try
	{
		getDb()->exec("DELETE FROM tasks WHERE Id=$id;");
	}
	catch(PDOException $e)
	{
		print 'Exception : ' . $e->getMessage();
	}
}


function getTasks()
{
	try
	{
	  $result = getDb()->query('SELECT * FROM tasks');
	}
	catch(PDOException $e)
	{
		print 'Exception : '.$e->getMessage();
	}

	return $result->fetchAll(PDO::FETCH_ASSOC);
}
