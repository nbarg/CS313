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
        <form action="vehicleSelection.php" method="post" id='login'>
            <!-- if bad login -->
            <?php if (!empty($error)){
            echo "<p id='error'>" . $error . "</p>";
            }?>
            <label>Username:</label>
            <input type="text" name="user"><br/>
            <label>Password:</label>
            <input type="password" name="password"><br/>
            <input type="submit" value="Login">
        </form>
            <p>You can log in using the username of nate or cassy(lower case). 
                The username and password are the same</p>
        </div>
    </body>

</html>
