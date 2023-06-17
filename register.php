<?php


require 'function.php';

if (isset($_SESSION["id"])) {
    header("Location: home.php");
}
$register = new Register();

if (isset($_POST["submit"])) {
    $result = $register->registration($_POST["name"], $_POST["phone"], $_POST["email"], $_POST["password"]);

    if ($result == 1) {
        echo "<script> alert('Registration Successfull'); </script>";
        header("Location: login.php");
    } else {
        echo "<script> alert('Name AND Email has already taken'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Website</title>
</head>

<body>
    <div class="center">
        <h1>Registration</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="name" required>
                <span></span>
                <label>Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="phone" required>
                <span></span>
                <label>Phone</label>
            </div>
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" name="submit" value="Create account">
            <div class="signup_link">
                Already have an account? <a href="login.php">Sign In</a>
            </div>
        </form>
    </div>
</body>

</html>