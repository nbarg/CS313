<?php

/* 
 * this page will be used to insert a new entry into the entry page
 */

require_once 'database.php';
$db = loadDB();

$user_id = filter_input(INPUT_POST, 'user_id',FILTER_VALIDATE_INT);
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id',FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description');
$service_date = filter_input(INPUT_POST, 'service_date');
$notes = filter_input(INPUT_POST, 'notes');

if($notes == false){
    $notes = ' ';
}

$query_insert_entry = 'INSERT INTO entry (user_id, vehicle_id
                                          , desctiption, service_date, notes)
                        VALUES ( :user_id
                               , :vehicle_id
                               , :description
                               , :service_date
                               , :notes)';
$insert_stmt = $db->prepare($query_insert_entry);
$insert_stmt->bindValue(':user_id', $user_id);
$insert_stmt->bindValue(':vehicle_id', $vehicle_id);
$insert_stmt->bindValue(':description', $description);
$insert_stmt->bindValue(':service_date', $service_date);
$insert_stmt->bindValue(':notes', $notes);
$insert_stmt->execute();
$insert_stmt->closeCursor();
include 'entries.php';