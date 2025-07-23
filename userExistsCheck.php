<?php
// this will fix $_SESSION data saving issue with some servers or different PHP versions
ini_set('session.save_path', 'C:\xampp\session');
//needs to be at the start of every page where you will use $_SESSION
session_start();

class DBConnection extends SQLite3
{
  function __construct()
  {
    $this->open('./db/new.db');
  }
}

$db = new DBConnection();


// Checking input data from Customer here
if (empty($_REQUEST['user']) 
    || empty($_REQUEST['pass']))
 {
 
  header("Location: login.php?login=empty");
  exit;

} else {
  $user = $db->escapeString(htmlspecialchars($_REQUEST['user']));
  $pass = $db->escapeString(htmlspecialchars($_REQUEST['pass']));
}

if (!$db) {
  echo $db->lastErrorMsg();
  header("Location: login.php?login=dbfail");
  exit;
  
} else {

  $query = "select User_Name, Password1, Email from
    RegisteredUsers WHERE User_Name='$user' AND Password1='$pass' limit 1";

  $results = $db->query($query);

  $theData = array();
  while ($entry = $results->fetchArray(SQLITE3_ASSOC)) {
    array_push($theData, $entry);
  }

  if (count($theData) == 1) {
    //we have a result if we had an encrypted password we would check here
    //as the select would only be on the username

    //set session as logged in and save user name also as its needed for bookings!
    $_SESSION['loggedIn'] = 1;
    $_SESSION['userName'] = $user;

    header("Location: login.php?login=ok");
  } else {
    //no result
    header("Location: login.php?login=nouser");
  }
}

$db->close(); 


?>
