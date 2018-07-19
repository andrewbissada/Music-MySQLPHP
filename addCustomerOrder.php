<?php
include 'dbconnect.php';
//Get All Concerts
$sql_Concerts = "SELECT ConcertID,ConcertName FROM Concerts";
$Concerts_data = $mysqli->query($sql_Concerts);
?>

<style>
    .dev-left{
        float: left;
    }
</style>

<form action="addcustomerorderssrv.php" method="post">
    Customer Name:
    <input type="text" name="CustomerName" id="CustomerName">
    <br>
    <!--Concert name-->
    Concert Name:
    <?php if ($Concerts_data->num_rows > 0) { ?>
        <select name="ConcertName" style="width: 150px;">
            <!--<option value="">------Select-------</option>-->
            <?php while ($row = $Concerts_data->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['ConcertID']; ?>">
                    <?php echo $row['ConcertName']; ?>
                </option>
            <?php }
            ?>
        </select>
        <?php
    } else {
        echo 'No Concert Name Name Found';
    }
    ?>
    <br/>
    Purchase Price:
    <input type="text" name="PurchasePrice" id="PurchasePrice">
    <br>
    Discount:
    <select name="Discount">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
    <br>
    <br>
    <input type="submit" value="Submit">
</form> 