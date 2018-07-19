<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#ConcertDate").datepicker({
                dateFormat: 'yy-mm-dd' 
            });
        });
    </script>
</head>
<?php
include 'dbconnect.php';
//Get All Concerts
$sql_concerts = "SELECT ConcertID,ConcertName FROM Concerts";
$concert_data = $mysqli->query($sql_concerts);

// Get all artists
$sql_artist = "SELECT ArtistID,ArtistName FROM Artists";
$artists_data = $mysqli->query($sql_artist);
?>

<style> 
    .dev-left{
        float: left;
    }
</style>

<form action="addConcertDetailssrv.php" method="post">
    <!--Concert name-->
    Concert Name:
    <?php if ($concert_data->num_rows > 0) { ?>
        <select name="ConcertName" style="width: 150px;">
            <!--<option value="">------Select-------</option>-->
            <?php while ($row = $concert_data->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['ConcertID']; ?>">
                    <?php echo $row['ConcertName']; ?>
                </option>
            <?php }
            ?>
        </select>
        <?php
    } else {
        echo 'No Genre Name Found';
    }
    ?>
    <br/>
    Concert Date:
    <input type="text" name="ConcertDate" id="ConcertDate">
    <br>
    Cost:
    <input type="text" name="Cost" id="Cost">
    <br>
    <br/>
    <input type="submit" value="Submit">
</form> 