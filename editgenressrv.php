<?php

//include 'dbconnect.php';

$link = new mysqli('127.0.0.1', 'andrew79_601', 'csis601', 'andrew79_601');
if ($link->connect_errno) {
    echo "Error: Failed to make a MySQL connection, here is why: </br>";
    echo "Errno: " . $link->connect_errno . "</br>";
    echo "Error: " . $link->connect_error . "</br>";
    
    exit;
}

//$sql = "update Genres set ";
//$sql .= "GenreID = '" . $_REQUEST["GenreID"] ."'," ;
//$sql .= "GenreName = '" . $_REQUEST["GenreName"] ."' " ;
//$sql .= "where GenreID = " . $_REQUEST['GenreID']; 

// Escape user inputs for security
$GenreID = mysqli_real_escape_string($link, $_REQUEST['GenreID']);
$GenreName = mysqli_real_escape_string($link, $_REQUEST['GenreName']);



// attempt insert query execution
//$sql = "UPDATE persons SET email='peterparker_new@mail.com' WHERE id=1";
//$sql = "UPDATE Genres SET GenreID='$GenreID' WHERE GenreName='$GenreName')";
$sql = "UPDATE Genres SET GenreName='{$GenreName}' WHERE GenreID='{$GenreID}'";

if (!$result = $link->query($sql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $link->errno . "</br>";
    echo "Error: " . $link->error . "</br>";
   
    exit;
}
?>
<script>
window.location='genres.php';
</script>