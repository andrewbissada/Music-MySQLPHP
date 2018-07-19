<?php
include "dbconnect.php";
$sql = "delete from Albums where AlbumID= " .  $_REQUEST["AlbumID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='albums.php';
</script>