<a href="albums.php">Albums</a> 
<a href="artists.php">Artists</a> 
<a href="concertdetails.php">ConcertDetails</a> 
<a href="concerts.php">Concerts</a> 
<a href="customerorders.php">CustomerOrders</a> 
<a href="genres.php">Genres</a>
<a href="songs.php">Songs</a>
<a href="venues.php">Venues</a>
<a href="venuezip.php">VenueZip</a>   
<a href="albumReport.php">Album Report</a>

<?php

include 'dbconnect.php';

// Perform an SQL query
$sql = "SELECT * FROM Venues";
if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";

    // Again, do not do this on a public site, but we'll show you how
    // to get the error information
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}
echo "<table border=1>";
echo "<tr><th>VenueID</th><th>VenueName</th><th>Action</th></tr>";
while($row = $result->fetch_assoc()) {
   echo "<tr>";
   echo "<td>";
   echo $row["VenueID"];
   echo "</td>";
   echo "<td>";
   echo $row["VenueName"];
   echo "</td>";
   echo "<td>";
   echo "<a href='deletevenues.php?VenueID=" . $row['VenueID'] . "'>Del </a>";
   echo "<a href='editvenues.php?VenueID=" . $row['VenueID'] ."'>Edit</a></td>";
   echo "</tr>";      
}
?>
</table>
<a href="addvenue.htm">Add New</a> 