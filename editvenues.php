<?php
include "dbconnect.php";
$sql = "select * from Venues where VenueID = " .  $_REQUEST["VenueID"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();
?>

<form action="editvenuessrv.php" method="post">

<input type="hidden" name="VenueID" value="<?php echo $_REQUEST['VenueID']; ?>"/>


GenreName:<input type="text" name="VenueName" value="<?php echo $row['VenueName']; ?>"/></br>
<input type="submit"/>
</form>