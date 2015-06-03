# trip_algo

<h3>General information of php code of Trip sorting</h3>
<p>
1.Fiile Structure <br/>
   trip <br/>
    -- README.txt <br/>
    -- index.php <br/>
    -- trip.php <br/>
    
    <br/>
2.trip - Main root folder or application
<br/>
3.README.txt - General information about application and file structure
<br/>
4.index.php - action file
<br/>
5.trip.php - Main class for sorting algorithm of trip 
<br/>
</p>
-------------------------------------------------------------------------
<h3>Input parameters and sequence</h3>
======================================================
<p>
- Set routes in array format <br/>
Elements sequence <br/>
<ul>
  <li>0 = Vehicle information ( Like Train , flight)</li>
  <li>1 = Starting point ( Like Madrid )</li>
  <li>2 = Ending point ( Like Barcelona )</li>
  <li>3 = Seat No ( Like 45B )</li>
  <li>4 = Vehicle No ( Like SK22)</li>
  <li>5 = Gate No ( Like 22)</li>
  <li>6 = Baggage details ( Like Transfer )</li>

E.g
<ul>
  <li>$obTrip->setCard(array("Flight", "Stockholm", "New York JFK", "7B", "SK22", "22", "transfer"));</li>
  <li>$obTrip->setCard(array("Airport Bus", "Barcelona", "Gerona Airport", "", "", "", ""));</li>
  <li>$obTrip->setCard(array("Flight", "Gerona Airport", "Stockholm", "3A", "SK455", "45B", "344"));</li>
  <li>$obTrip->setCard(array("Train", "Madrid", "Barcelona", "45B", "78A", "", ""));</li>
</ul>  
  </p>
--------------------------------------------------------------------------------------------------------


<h3>Main Starting and ending Points</h3>
==========================================================
<p>
You can change starting and ending points.<br/>
  $obTrip = new Trip('Madrid', 'New York JFK');
</p>
------------------------------------------------------------------

<h3>Output</h3>
===========================================================
<p>
Based on starting and ending points result will be display as following list <br/>
<ol>
    <li>Take train 78A from Madrid to Barcelona. Sit in seat 45B.</li>
   <li> Take the airport bus from Barcelona to Gerona Airport. No seat assignment.</li>
   <li> From Gerona Airport, take flight SK455 to Stockholm. Gate 3A, seat 45B. Baggage drop at ticket counter 344.</li>
   <li> From Stockholm, take flight SK22 to New York JFK. Gate 7B, seat 22. Baggage will we automatically transferred from your last leg.</li>
   <li> You have arrived at your final destination.</li>
   </ol>
</p>
