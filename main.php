<?php
include 'classes/database.php';
include 'classes/users.php';
/* Till denna sida kommer användaren när den loggat in */

//Checking connection to database
$object = new DataBase();
$object->connect();

$email_login = $_POST['email_login'];
echo $email_login;

//Calling getAllUsers method
$getUserobject = new User($first_name, $last_name, $email, $password, $verifiedpassword);
//$getUserobject->getAllUsers();
$user = $getUserobject->getAllUsersStmt($email_login);
//$getUserobject->getName($first_name);
$getUserobject->getName("Bryan");
$getUserobject->getName("Santamaria");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>

<h1>Hello <?php echo $user ?> </h1>
    
</body>
</html>

