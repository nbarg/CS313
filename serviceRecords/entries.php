<?php

/* 
 * this page will display entries for a car
 */

require_once 'database.php';
$db = loadDB();

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
        <title>Entries</title>
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
        
        <h3>Add New Entry</h3>
        
        <form action="insertEntry.php" method="post" id="insertEntry">
            <label>Description</label>
            <select name="description">
                <option value="Oil change">Oil Change</option>
                <option value="Tire rotation">Tire rotation</option>
                <option value="Breaks">Breaks</option>
                <option value="Coolant">Coolant</option>
                <option value="Heat and air">Heat and air</option>
                <option value="Other">other</option>
            </select>
            <label>Notes</label>
            <textarea name="notes" id="notes" rows="4" cols="50"></textarea>
            <input type="hidden" name="vehicle_id" value="<?php echo $car; ?>">
            <input type="hidden" name="user_id" value="<?php echo $vehicle1['user_id']; ?>">
            <input type="hidden" name="service_date" value="<?php echo date('Y-m-d'); ?>">
            <input type="submit" value="Add"><br/><br/>
            
        </form>
        
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