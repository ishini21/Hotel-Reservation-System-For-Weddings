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

// Retrieve the venue ID to be deleted
$venueId = $_GET['id'];

// Delete the venue
$stmt = $conn->prepare("DELETE FROM venues WHERE id=?");
$stmt->bind_param("i", $venueId);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect back to the venue-details page after deleting the venue
header("Location: venue-details.php");
exit();
?>
