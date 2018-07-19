<?php
include "dbconnect.php";
$sql = "delete from ConcertDetails where ConcertID= " .  $_REQUEST["ConcertID"] . "'  and ConcertDate= " . $_REQUEST["ConcertDate"] . "";

myquery($mysqli,$sql);

?>
<script>
window.location='concertdetails.php';
</script>