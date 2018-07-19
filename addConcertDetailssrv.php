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
$ConcertName = mysqli_real_escape_string($link, $_REQUEST['ConcertName']);
$ConcertDate = mysqli_real_escape_string($link, $_REQUEST['concertDate']);
$Cost= mysqli_real_escape_string($link, $_REQUEST['Cost']);
// Formated data
$date=date_create($ConcertDate);
$format_data = date_format($date,"Y/m/d H:i:s");

echo '<pre>';
print_r($_POST);
echo '</pre>';
exit;

// attempt insert query execution
$sql = "INSERT INTO ConcertDetails (ConcertID,ConcertDate,Cost) VALUES ('$ConcertName','$format_data','$Cost')";

if (!$result = $link->query($sql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $link->errno . "</br>";
    echo "Error: " . $link->error . "</br>";
    exit;
}
?>
<script>
window.location='concertdetails.php';
</script>