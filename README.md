# trip_algo

General information of php code of Trip sorting 
================================================
1) Fiile Structure 

   trip 
    -- README.txt
    -- index.php
    -- trip.php

2) trip - Main root folder or application
3) README.txt - General information about application and file structure
4) index.php - action file
5) trip.php - Main class for sorting algorithm of trip 
-------------------------------------------------------------------------
Input parameters and sequence
======================================================
- Set routes in array format 
Elements sequence 
  0 = Vehicle information ( Like Train , flight)
  1 = Starting point ( Like Madrid )
  2 = Ending point ( Like Barcelona )
  3 = Seat No ( Like 45B )
  4 = Vehicle No ( Like SK22)
  5 = Gate No ( Like 22)
  6 = Baggage details ( Like Transfer )

E.g

  $obTrip->setCard(array("Flight", "Stockholm", "New York JFK", "7B", "SK22", "22", "transfer"));
  $obTrip->setCard(array("Airport Bus", "Barcelona", "Gerona Airport", "", "", "", ""));
  $obTrip->setCard(array("Flight", "Gerona Airport", "Stockholm", "3A", "SK455", "45B", "344"));
  $obTrip->setCard(array("Train", "Madrid", "Barcelona", "45B", "78A", "", ""));
--------------------------------------------------------------------------------------------------------


Main Starting and ending Points
==========================================================
You can change starting and ending points.

  $obTrip = new Trip('Madrid', 'New York JFK');

------------------------------------------------------------------

Output
===========================================================
Based on starting and ending points result will be display as following list 

    1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.
    2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
    3. From Gerona Airport, take flight SK455 to Stockholm. Gate 3A, seat 45B. Baggage drop at ticket counter 344.
    4. From Stockholm, take flight SK22 to New York JFK. Gate 7B, seat 22. Baggage will we automatically transferred from your last leg.
    5. You have arrived at your final destination.

