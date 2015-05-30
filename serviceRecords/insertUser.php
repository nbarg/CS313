<?php

/* 
 * this page will be used to insert a new user to the 
 */

require_once 'database.php';
$db = loadDB();

// get post values
$user_name = filter_input(INPUT_POST, 'user_name');
$password = filter_input(INPUT_POST, 'password');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email');

// create full name
$full_name = $first_name . ' ' . $last_name;

if ($full_name == false || $user_name == false || $password == false
        || $email == false){
    $error = 'All fields must be filled out.';
    include 'register.php';
    exit;
}

// check to see if the user name is already used
$query_check_user = 'SELECT * FROM user WHERE user_name = :user_name';
$user_statement = $db->prepare($query_check_user);
$user_statement->bindValue(':user_name', $user_name);
$user_statement->execute();
$db_user_name = $user_statement->fetch();
$user_statement->closeCursor();

//var_dump($db_user_name);

if($db_user_name){
    $error = 'User name already used.';
    include 'register.php';
    exit;
}

// insert the new user
$query_insert = 'INSERT INTO user (user_name, password, full_name, email_address)
            VALUES ( :user_name
                   , :password
                   , :full_name
                   , :email)';
$insert_statement = $db->prepare($query_insert);
$insert_statement->bindValue(':user_name', $user_name);
$insert_statement->bindValue(':password', $password);
$insert_statement->bindValue(':full_name', $full_name);
$insert_statement->bindValue(':email', $email);
$insert_statement->execute();
$insert_statement->closeCursor();

$suscess = 'Suscessfully registration, login to proceed.';
include 'index.php';
