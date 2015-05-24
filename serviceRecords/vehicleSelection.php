<?php

/* 
 * this page will log you in and display all the info
 */
// get database connection
require_once 'database.php';
$db = loadDB();

$user = filter_input(INPUT_POST, "user");
$password  = filter_input(INPUT_POST, "password");

if ($user == NULL || $user == false || $password == NULL || $password == FALSE){
    $error = 'Must enter both username and password.';
    include 'index.php';
    exit();
}

// query database
$query = "SELECT * FROM user 
          WHERE user_name = :user
          AND password = :password";
$statement = $db->prepare($query);
$statement->bindValue(':user', $user);
$statement->bindValue(':password', $password);
$statement->execute();
$response = $statement->fetch();
$statement->closeCursor();

// validate user
if ($response){
    $_SESSION["userID"] = $response['user_id'];
}else {
     $error = 'Not a valid username or password.';
    include 'index.php';
    exit();
}

// get list of cars for user
$vehicleQuery = "SELECT * FROM vehicle WHERE user_id = :user_id";
$statement1 = $db->prepare($vehicleQuery);
$statement1->bindValue(':user_id', $response['user_id']);
$statement1->execute();
$vehicles = $statement1->fetchAll();
$statement1->closeCursor();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Vehicle Selection</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body>
        <form action="entries.php" method="post" id='selectCar'>
            <label>Select your vehicle</label>
            <select name="vehicle_id">
                <?php foreach ($vehicles as $vehicle) : ?>
                    <option value="<?php echo $vehicle['vehicle_id']; ?>">
                        <?php echo $vehicle['make'] . ' ' . $vehicle['model']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <input type="submit" value="Search">
        </form>
    </body>
</html>
