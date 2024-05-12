<!DOCTYPE html>
<html>
<head>
  <title>Wedding Venue Details</title>
  <link rel="stylesheet" type="text/css" href="css/venue.css">
</head>
<body>
  <div class="container">
    <h1>Wedding Venue Details</h1>

    <form method="POST" action="venue.php" enctype="multipart/form-data">
      <label for="venue-name">Venue Name:</label>
      <input type="text" id="venue-name" name="venue_name" required>

      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>

      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea>

      <label for="image">Image:</label>
      <input type="file" id="image" name="image" required accept="image/*">

      <input type="submit" value="Save Venue">
    </form>

    <?php
      include 'venue-details.php';
    ?>
  </div>
</body>
</html>
