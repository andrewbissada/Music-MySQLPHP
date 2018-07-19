<?php
include "dbconnect.php";
$sql = "select * from Albums where AlbumID= " .  $_REQUEST["AlbumID"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();
?>

<form action="editalbumssrv.php" method="post">

<input type="hidden" name="AlbumID" value="<?php echo $_REQUEST['AlbumID']; ?>"/>


AlbumName:<input type="text" name="AlbumName" value="<?php echo $row['AlbumName']; ?>"/></br>
<input type="submit"/>
</form>