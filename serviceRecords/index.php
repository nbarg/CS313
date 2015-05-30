<?php

/* 
 * This is a login page
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body>
        <div id="loginBox">
        <form action="login.php" method="post" id='login'>
            <!-- if bad login -->
            <?php if (!empty($error)){
            echo "<p id='error'>" . $error . "</p>";
            }?>
            <?php if (!empty($suscess)){
            echo "<p id='suscess'>" . $suscess . "</p>";
            }?>
            <label>Username:</label>
            <input type="text" name="user"><br/>
            <label>Password:</label>
            <input type="password" name="password"><br/>
            <input type="submit" value="Login">
            <a href="register.php">Register</a>
        </form>
        </div>
    </body>

</html>
