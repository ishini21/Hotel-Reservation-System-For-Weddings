<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wedding Hotel Reservation</title>
  <link rel="stylesheet" href="css/venue.css">
  <script src="scroll.js"></script>
</head>

<body>
  <header>
    <h1>Wedding Hotel Reservation</h1>
  </header>
  <div class="navbar">
    <img src="images/logo.png" class="logo">
    <ul>
      <li><a href="home.html">home</a></li>
      <li><a href="php/venuemain.php">venues</a></li>
      <li><a href="pkg.html">packages</a></li>
      <li><a href="contactus.html">contact us</a></li>
      <li><a href="gallary.html">Gallery</a></li>
      <li><a href="log.html">Login</a></li>
</div>

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
    

    while ($row = $result->fetch_assoc()) {
        echo '<div class="venue-details">';
        echo '<h2>Venue Name: ' . $row["venue_name"] . '</h2>';
        echo '<p>Location: ' . $row["location"] . '</p>';
        echo '<h3>Description:</h3>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<img src="' . $row["image"] . '" alt="Venue Image">';
        echo '</div>';
    }
} else {
    echo '<p>No data available.</p>';
}

$conn->close();
?>
