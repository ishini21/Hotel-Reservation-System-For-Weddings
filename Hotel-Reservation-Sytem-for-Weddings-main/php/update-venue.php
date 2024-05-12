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

// Retrieve the form inputs
$venueId = $_POST['venue_id'];
$venueName = $_POST['venue_name'];
$location = $_POST['location'];
$description = $_POST['description'];

// Update the venue details
$stmt = $conn->prepare("UPDATE venues SET venue_name=?, location=?, description=? WHERE id=?");
$stmt->bind_param("sssi", $venueName, $location, $description, $venueId);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect back to the venue-details page after modifying the venue
header("Location: venue-details.php");
exit();
?>
