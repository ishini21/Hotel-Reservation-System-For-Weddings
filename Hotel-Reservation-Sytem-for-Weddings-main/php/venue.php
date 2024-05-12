<?php
// Retrieve the form inputs
$venueName = $_POST['venue_name'];
$location = $_POST['location'];
$description = $_POST['description'];

// Validate and sanitize the inputs if needed

// Image handling
$imageName = $_FILES['image']['name'];
$imageTmpName = $_FILES['image']['tmp_name'];
$imageType = $_FILES['image']['type'];

// Validate the image type if needed

// Move the uploaded image to a desired directory
$targetDirectory = 'uploads/';
$targetFilePath = $targetDirectory . $imageName;
move_uploaded_file($imageTmpName, $targetFilePath);

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

// Prepare and execute the query to insert the venue details into the database
$stmt = $conn->prepare("INSERT INTO venues (venue_name, location, description, image) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $venueName, $location, $description, $targetFilePath);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect back to the index page after saving the venue
header("Location: venuemain.php");
exit();
?>
