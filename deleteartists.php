<?php
include "dbconnect.php";
$sql = "delete from Artists where ArtistID= " .  $_REQUEST["ArtistID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='artists.php';
</script>