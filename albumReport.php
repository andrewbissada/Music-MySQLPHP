<?php
//Db connection
include 'dbconnect.php';
//Get all album name
$sql_album = "SELECT AlbumName FROM Albums";
$album_data = $mysqli->query($sql_album);
//Get All genre
$sql_genre = "SELECT GenreName FROM Genres";
$genre_data = $mysqli->query($sql_genre);
// Get all artists
$sql_artist = "SELECT ArtistName FROM Artists";
$artists_data = $mysqli->query($sql_artist);
// Album table data
//$data = "";
if (isset($_POST['album']) && $_POST['album'] != NULL || isset($_POST['genre']) && $_POST['genre'] != NULL || isset($_POST['artist']) && $_POST['artist'] != NULL) {
    if (isset($_POST['album']) && $_POST['album'] != NULL) {
        $album_name = $_POST['album'];
        $where = "Albums.AlbumName='$album_name'";
    }
    if (isset($_POST['genre']) && $_POST['genre'] != NULL) {
        $genre_name = $_POST['genre'];
        if (isset($where) && $where != NULL) {
            $where .= " " . "AND Genres.GenreName='$genre_name'";
        } else {
            $where .= "Genres.GenreName='$genre_name'";
        }
    }
    if (isset($_POST['artist']) && $_POST['artist'] != NULL) {
        $artist_name = $_POST['artist'];
        if (isset($where) && $where != NULL) {
            $where .= " " . "AND Artists.ArtistName='$artist_name'";
        } else {
            $where .="Artists.ArtistName='$artist_name'";
        }
    }

    $data = "SELECT AlbumID,AlbumName,GenreName,ArtistName FROM Albums
   INNER JOIN Genres ON Albums.GenreID = Genres.GenreID
   INNER JOIN Artists ON Albums.ArtistID = Artists.ArtistID WHERE $where";
    $album_tab_data = $mysqli->query($data);
} else {
    $data = "SELECT AlbumID,AlbumName,GenreName,ArtistName FROM Albums
   INNER JOIN Genres ON Albums.GenreID = Genres.GenreID
   INNER JOIN Artists ON Albums.ArtistID = Artists.ArtistID";
    $album_tab_data = $mysqli->query($data);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Album Report</title>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            .dev-left{
                float: left;
            }
        </style>
    </head>
    <body>
        <!--Title-->
        <div style="text-align: center">
            <h1>Album Report</h1>
        </div>
        <!--Search-->
        <div style="text-align: center; border: 2px #dddddd solid; height: 30px; vertical-align: central">
            <div>
                <form action="albumReport.php" method="POST">
                    <!--Album drop down-->
                    <div>
                        <div class="dev-left">Album Name:&nbsp;</div>
                        <div class="dev-left">
                            <?php if ($album_data->num_rows > 0) { ?>
                                <select name="album" style="width: 150px;">
                                    <option value="">------Select-------</option>
                                    <?php while ($row = $album_data->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['AlbumName']; ?>">
                                            <?php echo $row['AlbumName']; ?>
                                        </option>
                                    <?php }
                                    ?>
                                </select>
                                <?php
                            } else {
                                echo 'No Album Name Found';
                            }
                            ?>
                        </div>
                    </div>
                    <!--Genre drop down-->                
                    <div>                    
                        <div class="dev-left">Genre Name:&nbsp;</div>
                        <div class="dev-left">
                            <?php if ($genre_data->num_rows > 0) { ?>
                                <select name="genre" style="width: 150px;">
                                    <option value="">------Select-------</option>
                                    <?php while ($row = $genre_data->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['GenreName']; ?>">
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
                        </div>
                    </div>
                    <!--Artist drop down-->
                    <div>                    
                        <div class="dev-left">Artist Name:&nbsp;</div>
                        <div class="dev-left">
                            <?php if ($artists_data->num_rows > 0) { ?>
                                <select name="artist" style="width: 150px;">
                                    <option value="">------Select-------</option>
                                    <?php while ($row = $artists_data->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['ArtistName']; ?>">
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
                        </div>
                    </div>
                    <input style="margin-left: -520px;" type="submit" value="Search">
                </form>
            </div>
        </div>
        <!--Content-->
        <div>
            <table>
                <tr>
                    <th>Sl</th>
                    <th>Album Name</th>
                    <th>Genre Name</th>
                    <th>Artist Name</th>
                </tr>
                <?php
                if ($album_tab_data->num_rows > 0) {
                    $sl = 1;
                    while ($row = $album_tab_data->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td><?php echo $row['AlbumName'] ?></td>
                            <td><?php echo $row['GenreName'] ?></td>
                            <td><?php echo $row['ArtistName'] ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo 'No Album Data Found';
                }
                ?>

            </table>
        </div>


    </body>
</html>

