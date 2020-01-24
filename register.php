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
  <title>Create account</title>
</head>
<body>

<create-account>
    <div class="text-center bold">
        <h1 id="create-account">Create account</h1>
    </div>
    <form action="/" method="post">
        <div class="form-group">
            <input type="text" class="form-control mt-2" name="firstName" placeholder="First name">
            <input type="text" class="form-control mt-2" name="lastName" placeholder="Last name">
            <input type="email" class="form-control mt-2" name="email" placeholder="Email">
            <input type="password" class="form-input form-control mt-2" name="password" id="password"
                placeholder="Password">
            <span><i toggle="#password" class="fas fa-eye-slash toggle-password" id="eyeIcon"></i></span>
            <input type="password" toggle="#verifyPassword" class="form input form-control mt-2" name="verifyPassword"
                id="verifyPassword" placeholder="Repeat your password">
        </div>

        <span>Already have an account? <a href="/" class="text-primary" id="login-link">Sign in!</a></span><br>
        <input type="submit" value="Create account" class="btn btn-primary">
    </form>
</create-account>

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