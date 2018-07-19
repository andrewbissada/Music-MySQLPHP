<?php
include 'dbconnect.php';
//Get All genre
$sql_genre = "SELECT GenreID,GenreName FROM Genres";
$genre_data = $mysqli->query($sql_genre);

// Get all artists
$sql_artist = "SELECT ArtistID,ArtistName FROM Artists";
$artists_data = $mysqli->query($sql_artist);
?>

<style>
    .dev-left{
        float: left;
    }
</style>

<form action="addalbumssrv.php" method="post">
    Album Name:
    <input type="text" name="AlbumName" id="AlbumName">
    <br>
    <!--Genre name-->
    Genre Name:
    <?php if ($genre_data->num_rows > 0) { ?>
        <select name="GenreName" style="width: 150px;">
            <!--<option value="">------Select-------</option>-->
            <?php while ($row = $genre_data->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['GenreID']; ?>">
                    <?php echo $row['GenreName']; ?>
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
    <br><br>
    <input type="submit" value="Submit">
</form> 