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

// Retrieve the venue ID
$venueId = $_GET['id'];

// Retrieve the venue details from the database
$stmt = $conn->prepare("SELECT * FROM venues WHERE id=?");
$stmt->bind_param("i", $venueId);
$stmt->execute();
$result = $stmt->get_result();
$venue = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Venue</title>
    <link rel="stylesheet" type="text/css" href="css/venue.css">
</head>
<body>
<div class="container">
    <h1>Edit Venue</h1>

    <form method="POST" action="update-venue.php" enctype="multipart/form-data">
        <input type="hidden" name="venue_id" value="<?php echo $venue['id']; ?>">

        <label for="venue-name">Venue Name:</label>
        <input type="text" id="venue-name" name="venue_name" value="<?php echo $venue['venue_name']; ?>" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo $venue['location']; ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $venue['description']; ?></textarea>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*">

        <input type="submit" value="Update Venue">
    </form>
</div>
</body>
</html>
