<?php
include "dbconnect.php";
$sql = "delete from Venues where VenueID= " .  $_REQUEST["VenueID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='venues.php';
</script>