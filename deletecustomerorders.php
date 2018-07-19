<?php
include "dbconnect.php";
$sql = "delete from CustomerOrders where OrderID= " .  $_REQUEST["OrderID"] ;

myquery($mysqli,$sql);

?>
<script>
window.location='customerorders.php';
</script>