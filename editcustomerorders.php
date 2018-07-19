<?php
include "dbconnect.php";
$sql = "select * from CustomerOrders where OrderID = " .  $_REQUEST["OrderID"];

$result = myquery($mysqli,$sql);

$row = $result->fetch_assoc();
?>

<form action="editcustomerorderssrv.php" method="post">

<input type="hidden" name="OrderID" value="<?php echo $_REQUEST['OrderID']; ?>"/>

CustomerName:<input type="text" name="CustomerName" value="<?php echo $row['CustomerName']; ?>"/></br>
PurchasePrice:<input type="text" name="PurchasePrice" value="<?php echo $row['PurchasePrice']; ?>"/></br>
<input type="submit"/>
</form>