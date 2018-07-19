<?php
include "dbconnect.php";
$sql = "select * from Songs where SongID = " .  $_REQUEST["SongID"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();
?>

<form action="editsongssrv.php" method="post">

<input type="hidden" name="SongID" value="<?php echo $_REQUEST['SongID']; ?>"/>


SongName:<input type="text" name="SongName" value="<?php echo $row['SongName']; ?>"/></br>
<input type="submit"/>
</form>