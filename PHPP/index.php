<?php
require_once('signup.php');
$database = new signup();

if (isset($_POST) && !empty($_POST)) {

    if ($_POST['password'] !== $_POST['confirmpassword']) {
        $errors[] = "Password and Confirm Password do not match.";
    }

    if (empty($errors)) {
        $database->insertData($_POST);
    } else {
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="...">
    <meta name="robots" content="noindex, nofollow">
    <title>Sign In</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@100&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
        <link rel="stylesheet" href="./css/style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<body>
 <!-- Form for Sign up-->
<div class="signup-card">
    <h2 class="text-center mb-4">Sign Up</h2>
    <form method="post" action="#">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
        </div>
        <div class="form-group">
            <label for="confirmpassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm your password" name="confirmpassword">
        </div>
        <button type="submit" class="btn btn-signup btn-block">Sign Up</button>
    </form>
</div>

</body>
</html>
