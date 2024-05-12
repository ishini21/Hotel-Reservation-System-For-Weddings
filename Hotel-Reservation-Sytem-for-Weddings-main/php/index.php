<?php
require 'connection.php';

// Delete data
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $imageQuery = mysqli_query($conn, "SELECT image FROM tb_upload WHERE id = '$id'");
    $imageData = mysqli_fetch_assoc($imageQuery);
    $imageFile = 'img/' . $imageData['image'];

    // Delete data from the database
    $deleteQuery = mysqli_query($conn, "DELETE FROM tb_upload WHERE id = '$id'");
    if ($deleteQuery) {
        // Delete the image file from the server
        if (file_exists($imageFile)) {
            unlink($imageFile);
        }
        echo "<script>alert('Data deleted successfully.');</script>";
    } else {
        echo "<script>alert('Failed to delete data.');</script>";
    }
}

// Update data
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $image = $_FILES["image"]["name"];
    $image_tmp = $_FILES["image"]["tmp_name"];

    // Check if a new image is selected
    if ($image != "") {
        $imageQuery = mysqli_query($conn, "SELECT image FROM tb_upload WHERE id = '$id'");
        $imageData = mysqli_fetch_assoc($imageQuery);
        $imageFile = 'img/' . $imageData['image'];

        // Delete the old image file from the server
        if (file_exists($imageFile)) {
            unlink($imageFile);
        }

        // Move the new uploaded image to the server
        move_uploaded_file($image_tmp, 'img/' . $image);
    } else {
        // Keep the existing image if no new image is selected
        $imageQuery = mysqli_query($conn, "SELECT image FROM tb_upload WHERE id = '$id'");
        $imageData = mysqli_fetch_assoc($imageQuery);
        $image = $imageData['image'];
    }

    // Update data in the database
    $updateQuery = mysqli_query($conn, "UPDATE tb_upload SET name = '$name', image = '$image' WHERE id = '$id'");
    if ($updateQuery) {
        echo "<script>alert('Data updated successfully.');</script>";
    } else {
        echo "<script>alert('Failed to update data.');</script>";
    }
}

// Edit data
if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $editQuery = mysqli_query($conn, "SELECT * FROM tb_upload WHERE id = '$id'");
    $editData = mysqli_fetch_assoc($editQuery);
    $name = $editData["name"];
    $image = $editData["image"];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Upload Image File</title>
</head>
<body>
    <h2>Upload Image File</h2>
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <?php if (isset($id)) : ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <?php endif; ?>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required value="<?php echo isset($name) ? $name : ''; ?>"><br>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"><br><br>
        <?php if (isset($id)) : ?>
            <button type="submit" name="update">Update</button>
        <?php else : ?>
            <button type="submit" name="submit">Submit</button>
        <?php endif; ?>
    </form>
    <br>
    <a href="data.php">View Data</a>

    <h2>Manage Data</h2>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Image</td>
            <td>Actions</td>
        </tr>
        <?php
        $i = 1;
        $rows = mysqli_query($conn, "SELECT * FROM tb_upload ORDER BY id DESC");
        foreach ($rows as $row) :
        ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><img src="../php/img/<?php echo $row["image"];?>" width="200" title="<?php echo $row['image']; ?>"></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="index.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
