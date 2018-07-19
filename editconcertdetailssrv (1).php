<?php
include "dbconnect.php";
$sql = "update ConcertDetails set ConcertDate = '" . $_REQUEST["ConcertDate"] . "'," .
  "Cost = " .   $_REQUEST["Cost"] . "' where ConcertID = '" .
  $_REQUEST["ConcertID"] . "' and ConcertDate = " .
  $_REQUEST["ConcertDate"];




myquery($mysqli,$sql);

?>
<script>
window.location='concertdetails.php';
</script>