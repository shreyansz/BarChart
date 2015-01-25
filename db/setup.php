<?php

$mysqli = new mysqli("localhost", "root", "");
if ($mysqli->connect_errno) 
{
    trigger_error("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, E_USER_ERROR);
}

$sql=file_get_contents("createeshdb.sql");
$rs=$mysqli->multi_query($sql);
if($rs === false) 
{
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
} 
while ($mysqli->more_results() && $mysqli->next_result());
//$mysqli->select_db("eshdb");
$sql = file_get_contents("seed.sql");
$rs=$mysqli->multi_query($sql);
if($rs === false) 
{
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
}
$mysqli->close();


//Mongodb 
$m = new MongoClient();
$db = $m->test;
$db->execute(file_get_contents("seed.js"));

echo "\nDatabases are ready to be used.";