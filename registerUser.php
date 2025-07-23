<?php
// this will fix $_SESSION data saving issue with some servers or different PHP versions
ini_set('session.save_path', 'C:\xampp\session');
//needs to be at the start of every page where you will use $_SESSION
session_start();

class DBConnection extends SQLite3 {
  function __construct() {
     $this->open("db/new.db");
  }
}


$db = new DBConnection();




// input checking
if ( empty($_REQUEST['user']) ||
     empty($_REQUEST['password1']) || 
     empty($_REQUEST['email']))
{
    header("Location: booking.php?registration=empty");
    exit;
}
else
{
    $user = $db->escapeString(htmlspecialchars($_REQUEST['user']));
    $password1 = $db->escapeString(htmlspecialchars($_REQUEST['password1']));
    $email = $db->escapeString(htmlspecialchars($_REQUEST['email']));
}

if(!$db) 
{

  echo $db->lastErrorMsg();
  header("Location: booking.php?registration=dbfail");
  exit;
} 
 else 
{ 
    //Check if user or email exists already
     
    $query = "SELECT User_Name, Password1, Email from RegisteredUsers WHERE User_Name='$user' OR Email='$email'";

    $results = $db->query($query); 

    $theData = array();
    while($entry = $results->fetchArray(1))
    {
      
       array_push( $theData, $entry );     
         
    }


    if (count($theData) > 0)
    {
        //Same username or email as an existing user
		header("Location: booking.php?registration=exists");
        exit;
    }
    
    //Insert new user into our database if there is not such a user already

    $stm = "INSERT INTO RegisteredUsers(User_Name, Password1, Email) 
    VALUES  ('$user', '$password1', '$email')";

   $return = $db->exec($stm);
   
   if(!$return) 
   { 
      echo $db->lastErrorMsg();
      header("Location: booking.php?registration=dbfail");
   } 
   else 
   {
       //set session as logged in and save user name also as its needed for bookings!
       $_SESSION["loggedIn"] = 1;
       $_SESSION["userName"] = $user;

      header("Location: booking.php?registration=success");
   }

   $db->close(); 
     
}



?>
