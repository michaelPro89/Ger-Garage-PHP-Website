<?php
// this will fix $_SESSION data saving issue with some servers or different PHP versions
ini_set('session.save_path', 'C:\xampp\session');
//needs to be at the start of every page where you will use $_SESSION
session_start();

class DBConnection extends SQLite3 {
  function __construct() {
     $this->open("./db/new.db");
  }
}

$db = new DBConnection();


// input checking

if ( empty($_REQUEST['name']) ||
     empty($_REQUEST['user']) ||       
     empty($_REQUEST['mobile_phone']) ||
     empty($_REQUEST['vehicle_type']) ||
     empty($_REQUEST['vehicle_make']) ||
     empty($_REQUEST['licence']) ||
     empty($_REQUEST['engine'])  ||
     empty($_REQUEST['type_of_booking']) ||
     empty($_REQUEST['date']) ||
     empty($_REQUEST['description'])
     
    )
{   

    header("Location: booking.php?registration=empty");
    exit;
}
else
{
    $name = $db->escapeString(htmlspecialchars($_REQUEST['name']));
    $user = $db->escapeString(htmlspecialchars($_REQUEST['user']));
    $mobile = $db->escapeString(htmlspecialchars($_REQUEST['mobile_phone']));
    $vehicle_type = $db->escapeString(htmlspecialchars($_REQUEST['vehicle_type']));
    $vehicle_make = $db->escapeString(htmlspecialchars($_REQUEST['vehicle_make']));
    $licence = $db->escapeString(htmlspecialchars($_REQUEST['licence']));
    $engine = $db->escapeString(htmlspecialchars($_REQUEST['engine']));
    $booking_type = $db->escapeString(htmlspecialchars($_REQUEST['type_of_booking']));
    $date = $db->escapeString(htmlspecialchars($_REQUEST['date']));
    $description = $db->escapeString(htmlspecialchars($_REQUEST['description']));

}

if(!$db) 
{

  echo $db->lastErrorMsg();
  header("Location: booking.php?registration=dbfail");
  exit;
} 
 else 
{ 
    // check if there is a similar booking inside the table first
    // the AND seperator after all conditions -  all must be true to select
    $query = "SELECT Customer_Name,User,Mobile_Phone,Vehicle_Type,Vehicle_Make,Vehicle_Licence,
    Engine_Type,Type_of_Booking,Description_of_problem,Date_Of_Repair FROM Bookings 
    WHERE Customer_Name='$name' AND User='$user' AND Mobile_Phone='$mobile' AND Vehicle_Type='$vehicle_type'
    AND Vehicle_Make='$vehicle_make' AND Vehicle_Licence='$licence' AND Type_of_Booking='$booking_type' 
    AND Date_Of_Repair='$date'";
     
  
    $results = $db->query($query); 

    $theData = array();
    while($entry = $results->fetchArray(1))
    {
      
       array_push( $theData, $entry );     
         
    }


    if (count($theData) > 0)
    {
        //Same booking exists, change header and exit from script
		header("Location: booking.php?registration=booking_exists");
        exit;
    } 
    
    //Check if picked day has 5 bookings already inside table              
    $query = "SELECT Date_Of_Repair FROM Bookings WHERE Date_Of_Repair='$date'";
 
    $results = $db->query($query); 

    $theData = array();

    while($entry = $results->fetchArray(1))
    {  
       array_push( $theData, $entry );  
    }

   
    if (count($theData) >= 5)
    {

        //There are 5 bookings for this day already!
		header("Location: booking.php?registration=day_full");
        exit;
    }
    

    //Insert new booking here if not found similar one
    $stm = "INSERT INTO Bookings(Customer_Name,User,Mobile_Phone,Vehicle_Type,Vehicle_Make,Vehicle_Licence,
    Engine_Type,Type_of_Booking,Description_of_problem,Date_Of_Repair) 
    VALUES ('$name','$user','$mobile','$vehicle_type','$vehicle_make','$licence','$engine','$booking_type','$description','$date')";
  

   $return = $db->exec($stm);
   
   if(!$return) 
   { 
      echo $db->lastErrorMsg();
      header("Location: booking.php?registration=dbfail");
   } 
   else 
   {
      header("Location: booking.php?registration=ok");
   }

   $db->close(); 
     
}



?>
