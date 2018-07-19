<?php
include "dbconnect.php";
$sql = "delete from Genres where GenreID= " .  $_REQUEST["GenreID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='genres.php';
</script>