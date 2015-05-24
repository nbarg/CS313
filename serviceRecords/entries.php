<?php

/* 
 * this page will display entries for a car
 */

require_once 'database.php';
$db = getDB();

$car = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);

// get all of the info about the vehicle
$vehicleQuery = "SELECT * FROM vehicle WHERE vehicle_id = $car";
$statement1 = $db->prepare($vehicleQuery);
$statement1->execute();
$vehicle1 = $statement1->fetch();
$statement1->closeCursor();

// get entries
$entryQuery = "SELECT * FROM entry WHERE vehicle_id = $car";
$statement2 = $db->prepare($entryQuery);
$statement2->execute();
$entries = $statement2->fetchAll();
$statement2->closeCursor();

// get list of cars for user
$vehiclesQuery = "SELECT * FROM vehicle WHERE user_id = :user_id";
$statement3 = $db->prepare($vehiclesQuery);
$statement3->bindValue(':user_id', $vehicle1['user_id']);
$statement3->execute();
$vehicles = $statement3->fetchAll();
$statement3->closeCursor();

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
        
        <h1><?php echo $vehicle1['make'] . $vehicle1['model']; ?></h1>
        
        <table id='entries'>
            <tr>
                <th style='width: 5em'>Date</th>
                <th style='width: 7em'>Description</th>
                <th>Notes</th>
            </tr>
            <?php foreach ($entries as $entry) : ?>
            <tr>
                <td><?php echo $entry['service_date']; ?></td>
                <td><?php echo $entry['desctiption']; ?></td>
                <td><?php echo $entry['notes']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        
    </body>
</html>