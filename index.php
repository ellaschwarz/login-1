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
        <form action="/login" method="post">
          <div class="text-center bold">
            <h1 id="create-account">Welcome!</h1>
            <p>Log in with your username or email and password</p>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email" id="emailVal">
            <input type="password" class="form-control mt-1" name="password" placeholder="Password">
            <span>Don't have an account? <a href="/register.php" class="text-primary" id="register">Create one!</a></span><br>
            <input type="submit" value="Sign in" class="btn btn-primary mt-1">
        </form>
      </login-container>
</main-content>

<?php
include 'classes/database.php';
include 'classes/users.php';

$first_name;
$last_name;
$email;
$password;
$verifiedpassword;

$persona = new User($first_name, $last_name, $email, $password, $verifiedpassword);
$persona->setName($first_name);
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