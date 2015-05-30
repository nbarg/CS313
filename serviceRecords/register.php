<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <script type="text/javascript">
            function validate(){
                var user_name = document.getElementById('user_name').value;
                var password = document.getElementById('password').value;
                var password2 = document.getElementById('password2').value;
                var first_name = document.getElementById('first_name').value;
                var last_name = document.getElementById('last_name').value;
                var email = document.getElementById('email').value;
                
                return true;
            }
        </script>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body>
        <div id="registerBox">
            <form action="insertUser.php" onsubmit="return validate()" method="post">
                <?php if (!empty($error)){
                    echo "<p id='error'>" . $error . "</p>";
                }?>
                User name: <input type="text" id='user_name' name='user_name'><br/>
                Password: <input type="password" id="password" name='password'><br/>
                Repeat password: <input type="password" id="password2" name='password2'><br/>
                First name: <input type="text" id="first_name" name='first_name'><br/>
                Last name: <input type="text" id="last_name" name='last_name'><br/>
                Email address: <input type="text" id="email" name='email'><br>
                <input type="submit">
                <input type="reset">
            </form>
        </div>
    </body>
</html>
