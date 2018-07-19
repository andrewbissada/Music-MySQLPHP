<?php
include "dbconnect.php";
$sql = "select * from Genres where GenreID = " .  $_REQUEST["GenreID"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();
?>

<form action="editgenressrv.php" method="post">

<input type="hidden" name="GenreID" value="<?php echo $_REQUEST['GenreID']; ?>"/>

<!-- GenreID:<input type="text" name="GenreID" id="GenreId"/></br> -->
<!-- GenreName:<input type="text" name="GenreName" id="GenreName"/></br> -->

GenreName:<input type="text" name="GenreName" value="<?php echo $row['GenreName']; ?>"/></br>
<input type="submit"/>
</form>