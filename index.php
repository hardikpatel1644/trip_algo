<?php

/**
 * main file to execute trip action 
 *
 * @author Hardik Patel <hardik@techdefence.com>
 */
// Include trip class
require_once 'trip.php';

// Create an object of trip class 
$obTrip = new Trip('Madrid', 'New York JFK');

// Set cards parameters as array  
$obTrip->setCard(array("Flight", "Stockholm", "New York JFK", "7B", "SK22", "22", "transfer"));
$obTrip->setCard(array("Airport Bus", "Barcelona", "Gerona Airport", "", "", "", ""));
$obTrip->setCard(array("Flight", "Gerona Airport", "Stockholm", "3A", "SK455", "45B", "344"));
$obTrip->setCard(array("Train", "Madrid", "Barcelona", "45B", "78A", "", ""));

// Display result
$asResult = $obTrip->result();
echo $asResult;
?>
