<?php
include "dbconnect.php";
$sql = "delete from Concerts where ConcertID= " .  $_REQUEST["ConcertID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='concerts.php';
</script>