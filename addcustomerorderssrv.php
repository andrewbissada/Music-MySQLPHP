<?php
//include 'dbconnect.php';
$link = new mysqli('127.0.0.1', 'andrew79_601', 'csis601', 'andrew79_601');
if ($link->connect_errno) {
    echo "Error: Failed to make a MySQL connection, here is why: </br>";
    echo "Errno: " . $link->connect_errno . "</br>";
    echo "Error: " . $link->connect_error . "</br>";
    exit;
}

$CustomerName = mysqli_real_escape_string($link, $_REQUEST['CustomerName']);
$ConcertID = mysqli_real_escape_string($link, $_REQUEST['ConcertName']);
$PurchasePrice = mysqli_real_escape_string($link, $_REQUEST['PurchasePrice']);
$Discount = mysqli_real_escape_string($link, $_REQUEST['Discount']);


// attempt insert query execution
$sql = "INSERT INTO CustomerOrders (CustomerName,ConcertID,PurchasePrice,DiscountCode) VALUES ('$CustomerName','$ConcertID','$PurchasePrice','$Discount')";
//$sql = "INSERT INTO CustomerOrders (CustomerName,ConcertID,PurchasePrice,DiscountCode) VALUES ('1','2','120','yes')";

if (!$result = $link->query($sql)) {
    echo "Error: SQL Error: </br>";
    echo "Errno: " . $link->errno . "</br>";
    echo "Error: " . $link->error . "</br>";
    exit;
}
?>
<script>
    window.location = 'customerorders.php';
</script>