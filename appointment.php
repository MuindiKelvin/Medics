<! DOCTYPE html>
<html>
<body>
</body>
</html>
<?php
//create server and database connection constants
$host = "localhost";
$user = "root";
$pwd = "";
$db = "health";

$con= new mysqli ($host, $user, $pwd, $db);

//Check server connection
if ($con->connect_error){
	die ("Connection failed:". $con->connect_error);
}else {
	echo "Welcome all <br />";
		//receive  values from user form and trim white spaces
$name=trim($_POST['name']);
$email=trim($_POST['email']);
$phone=trim($_POST['phone']);
$subject=trim($_POST['subject']);
$message=trim($_POST['message']);
$county=trim($_POST['county']);


//now insert the received values into database using defined variables
$sqli ="INSERT INTO appointments(name,email,phone,subject,message,county) VALUES ('$name','$email','$phone','$subject','$message','$county')";
if ($con->query($sqli) === TRUE) {
    echo "Your Message has been Received Successfully";
} else {
    echo "Error: " . $sqli . "<br>" . $con->error;
}
$con->close(); //close the connection for security reason
}
//if(!isset($login_session)){
//mysql_close($connection); // Closing Connection
//header('Location:index.html'); // Redirecting To Home Page
//}
?>