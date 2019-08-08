<?php

session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['Submit'])) 
{
  if (empty($_POST['name']) || empty($_POST['password'])) 
  {
    $error = "name or Password is invalid";
  }
  else
  {
    // Define $username and $password
    $name=$_POST['name'];
    $password=$_POST['password'];
    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
  $connection = mysql_connect("localhost", "root", "");
    // To protect MySQL injection for Security purpose
    $name = stripslashes($name);
    $password = stripslashes($password);
    $name = mysql_real_escape_string($name);
    $password = mysql_real_escape_string($password);
    $password= md5($password);

    // Selecting Database
    $db = mysql_select_db("health", $connection);
    // SQL query to fetch information of registerd users and finds user match.
    $query = mysql_query("SELECT * FROM register WHERE  name='$name' AND password='$password'",$connection);
    $rows = mysql_num_rows($query);
      
    if ($rows == 1) 
    {
        $_SESSION['login_user']=$name; // Initializing Session
        header("location: index.html"); // Redirecting To Other Page
    } 
    else
     {
        $error = "name or Password is invalid hence you need to reset your password or register";
        echo $error;
        {
          header("location:login.html");
         }
        }
    
    mysql_close($connection); // Closing Connection
    }
}
?>