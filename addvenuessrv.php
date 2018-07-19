<?php

//include 'dbconnect.php';

$link = new mysqli('127.0.0.1', 'andrew79_601', 'csis601', 'andrew79_601');
if ($link->connect_errno) {
    echo "Error: Failed to make a MySQL connection, here is why: </br>";
    echo "Errno: " . $link->connect_errno . "</br>";
    echo "Error: " . $link->connect_error . "</br>";
    
    exit;
}
 
// Escape user inputs for security
$VenueID= mysqli_real_escape_string($link, $_REQUEST['VenueID']);
$VenueName= mysqli_real_escape_string($link, $_REQUEST['VenueName']);



// attempt insert query execution
$sql = "INSERT INTO Venues (VenueID, VenueName) VALUES ('$VenueID', '$VenueName')";

if (!$result = $link->query($sql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $link->errno . "</br>";
    echo "Error: " . $link->error . "</br>";
   
    exit;
}
?>
<script>
window.location='venues.php';
</script>