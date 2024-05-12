<?php
// Connect to the database
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'contact';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the venues from the database
$sql = "SELECT * FROM venues";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h2>Available Venues:</h2>';

    while ($row = $result->fetch_assoc()) {
        echo '<div class="venue-details">';
        echo '<h2>Venue Name: ' . $row["venue_name"] . '</h2>';
        echo '<p>Location: ' . $row["location"] . '</p>';
        echo '<h3>Description:</h3>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<img src="' . $row["image"] . '" alt="Venue Image">';
        echo '<div class="actions">';
        echo '<a href="edit-venue.php?id=' . $row["id"] . '">Edit</a>';
        echo '<a href="delete-venue.php?id=' . $row["id"] . '">Delete</a>';
        echo '</div>';
        echo '</div>';
    }
    
    // Add "View Data" button
    echo '<div class="actions">';
    echo '<a href="view-data.php">View Data</a>';
    echo '</div>';
} else {
    echo '<p>No venues available.</p>';
}

$conn->close();
?>
