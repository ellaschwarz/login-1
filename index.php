<?php
include 'classes/database.php';
include 'classes/users.php';

//Starts a new session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <link rel='stylesheet' href='/styles/style.css'/>
  <title>Login</title>
</head>

<body>

<main-content>
    <login-container>
        <form action="main.php" method="post">
          <div class="text-center bold">
            <h1 id="create-account">Welcome!</h1>
            <p>Log in with your username or email and password</p>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="email_login" placeholder="Email" id="emailVal" required>
            <input type="password" class="form-control mt-1" name="password_login" placeholder="Password" required>
            <span>Don't have an account? <a href="/register.php" class="text-primary" id="register">Create one!</a></span><br>
            <input type="submit" value="Sign in" class="btn btn-primary mt-1">
        </form>
      </login-container>
</main-content>

<?php

//Saving user values from register form into variables
$first_name = $_POST["firstname"];
$last_name = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$verifiedpassword = $_POST["verifiedpassword"];

// $persona = new User($first_name, $last_name, $email, $password, $verifiedpassword);
// $persona->getAllUsers();

//Checking connection to database
$object = new DataBase();
$object->connect();

//Calling getAllUsers method
$getUserobject = new User($first_name, $last_name, $email, $password, $verifiedpassword);
//$getUserobject->getAllUsers();
// $getUserobject->getAllUsersStmt("Ella", "Schwarz");
// $getUserobject->getName($first_name);

if($getUserobject->startSession() )
{
  header("location:index.php");
}

//Validates user input, returns value if OK otherwise returns false.
$set_first_name = $getUserobject->setName($first_name);
$set_last_name = $getUserobject->setLastName($last_name);
$set_email = $getUserobject->setEmail($email);
$set_password = $getUserobject->setPassword($password, $verifiedpassword);

//Calls setUser function to insert the user into DB. Only inserts if values are not false.
$getUserobject->setUser($set_first_name, $set_last_name, $set_email, $set_password);

?>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>

</html>