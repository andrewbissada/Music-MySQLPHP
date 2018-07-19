<?php
include 'dbconnect.php';
//Get All Venues
$sql_Venues = "SELECT VenueID,VenueName FROM Venues";
$Venues_data = $mysqli->query($sql_Venues);

// Get all artists
$sql_artist = "SELECT ArtistID,ArtistName FROM Artists";
$artists_data = $mysqli->query($sql_artist);
?>

<style>
    .dev-left{
        float: left;
    }
</style>

<form action="addconcertssrv.php" method="post">
    Concert Name:
    <input type="text" name="ConcertName" id="ConcertName">
    <br>
    <!--Artists name-->
    Artist Name:
    <?php if ($artists_data->num_rows > 0) { ?>
        <select name="ArtistName" style="width: 150px;">
            <!--<option value="">------Select-------</option>-->
            <?php while ($row = $artists_data->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['ArtistID']; ?>">
                    <?php echo $row['ArtistName']; ?>
                </option>
            <?php }
            ?>
        </select>
        <?php
    } else {
        echo 'No Artist Name Found';
    }
    ?>    
    <br>
    <!--Venues name-->
    Venues Name:
    <?php if ($Venues_data->num_rows > 0) { ?>
        <select name="VenuesName" style="width: 150px;">
            <!--<option value="">------Select-------</option>-->
            <?php while ($row = $Venues_data->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['VenueID']; ?>">
                    <?php echo $row['VenueName']; ?>
                </option>
            <?php }
            ?>
        </select>
        <?php
    } else {
        echo 'No Venue Name Found';
    }
    ?>
    <br/>

    <br>
    <input type="submit" value="Submit">
</form> 