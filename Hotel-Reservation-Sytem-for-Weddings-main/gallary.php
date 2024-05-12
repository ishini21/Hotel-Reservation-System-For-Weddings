<?php
include_once 'crud.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wedding Gallery</title>
  <link rel="stylesheet" href="gallary.css">
</head>

<body>
<form action="crud.php" method="POST">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <button type="submit">Create</button>
</form>


  <header>
    <h1>Wedding Hotel Reservation</h1>
  </header>
  <div class="navbar">
    <img src="logo.png" class="logo">
    <ul>
        <li><a href="home.html">home</a></li>
        <li><a href="package.html">packages</a></li>
        <li><a href="contactus.html">contact us</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="login.html">Login</a></li>
</div>

<form id="upload-form" enctype="multipart/form-data">
  <input type="file" id="image-upload" accept="image/*" required>
  <button type="submit">Upload</button>
</form>

<div id="image-gallery"></div>

<script src="gallary.js"></script>

  <footer>
    <p class="footerh">&copy; 2023 Hotel Reservation System</p>
  </footer>
</body>

</html>
