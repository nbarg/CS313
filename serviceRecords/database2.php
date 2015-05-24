<?php

/* 
 * this will create a connection to the database
 */

function getDB() {
    $server = 'localhost';
    $database = 'car_service';
    $username = 'natebarg_iClient';
    $password = 'THxDey&2kuK^';

    $dsn = 'mysql:host=' . $server . ';dbname=' . $database;
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $db = new PDO($dsn, $username, $password, $options);
        return $db;
    } catch (PDOException $ex) {
        echo 'it didnt work';
    }
}

