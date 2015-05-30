<?php

/* 
 * this page will log you in and display all the info
 */
// get database connection
require_once 'database.php';
$db = loadDB();

//session_start();

// get list of cars for user
$vehicleQuery = "SELECT * FROM vehicle WHERE user_id = :user_id";
$statement1 = $db->prepare($vehicleQuery);
$statement1->bindValue(':user_id', $_SESSION["userID"]);
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
        
        <h1>Add New Vehicle</h1>
        
        <form action="insertVehicle.php" method="post" id="insertVehicle">
            <?php if (!empty($error)){
            echo "<p id='error'>" . $error . "</p>";
            }?>
            <label>Make</label>
            <input type="text" id="make" name="make">
            <label>Model</label>
            <input type="text" id="model" name="model">
            
            <input type="hidden" name="user_id" value="<?php echo $_SESSION["userID"] ?>">
            <input type="submit" value="Add">
        </form>
    </body>
</html>
