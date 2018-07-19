<?php
include "dbconnect.php";
$sql = "select * from ConcertDetails where ConcertID = " .  $_REQUEST["ConcertID"] . "' and ConcertDate = " .
  $_REQUEST["ConcertDate"] . "";

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();
?>

<form action="editconcertdetailssrv.php" method="post">

<input type="hidden" name="ConcertID" value="<?php echo $_REQUEST['ConcertID']; ?>"/>
<input type="hidden" name="ConcertDate" value="<?php echo $_REQUEST['ConcertDate']; ?>"/>

GenreName:<input type="text" name="Cost" value="<?php echo $row['Cost']; ?>"/></br>
<input type="submit"/>
</form>