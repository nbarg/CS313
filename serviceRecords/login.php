<?php

/* 
 * this will be used to login
 */

require_once 'database.php';
$db = loadDB();

session_start();

$user = filter_input(INPUT_POST, "user");
$password  = filter_input(INPUT_POST, "password");

if ($user == NULL || $user == false || $password == NULL || $password == FALSE){
    $error = 'Must enter both username and password.';
    include 'index.php';
    exit();
}

// query database for user info
$query = "SELECT * FROM user 
          WHERE user_name = :user
          AND password = :password";
$statement = $db->prepare($query);
$statement->bindValue(':user', $user);
$statement->bindValue(':password', $password);
$statement->execute();
$response = $statement->fetch();
$statement->closeCursor();
$user_id = $response['user_id'];

//var_dump($user_id);
// validate user
if ($response){
    $_SESSION["userID"] = $user_id;
    setcookie('user_id', $response['user_id'], time() + (86400 * 30), "/");
    include 'vehicleSelection.php';
}else {
     $error = 'Not a valid username or password.';
    include 'index.php';
    exit();
}
