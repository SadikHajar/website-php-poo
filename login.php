<?php


require 'function.php';

if (isset($_SESSION["id"])) {
    header("Location: home.php");
}

$login = new Login();

if (isset($_POST["submit"])) {
    $result = $login->login($_POST["email"], $_POST["password"]);

    if ($result == 1) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idUser();
        header("Location: home.php");
    } else {
        echo "<script> alert('User Not Registred'); </script>";
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
        <h1>Login</h1>
        <form method="post">
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
            <div class="pass">Forgot Password?</div>
            <input type="submit" name="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="register.php">Sign Up</a>
            </div>
        </form>
    </div>
</body>

</html>