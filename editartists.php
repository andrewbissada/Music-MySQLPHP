<?php
include "dbconnect.php";
$sql = "select * from Artists where ArtistID = " .  $_REQUEST["ArtistID"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();
?>

<form action="editartistssrv.php" method="post">

<input type="hidden" name="ArtistID" value="<?php echo $_REQUEST['ArtistID']; ?>"/>


ArtistName:<input type="text" name="ArtistName" value="<?php echo $row['ArtistName']; ?>"/></br>
<input type="submit"/>
</form>