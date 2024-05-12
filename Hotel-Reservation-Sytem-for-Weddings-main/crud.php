<?php
// Database configuration

  $sname="localhost";
  $uname="root";
  $password="";
  $db_name="images_gal";
  $table="images_gallery";

  $conn=mysqli_connect($sname,$uname,$password,$db_name);
  if(!$conn)
  {
    echo "connection failed!";
    exit();
  }
  
// Create operation
function createItem($name, $imageDir)
{
    global $db;

    try {
        // Prepare the SQL statement
        $stmt = $db->prepare("INSERT INTO image_gallery(name, image_dir) VALUES (name, imageDir)");

        // Bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':imageDir', $imageDir);

        // Execute the statement
        $stmt->execute();

        // Get the last inserted ID
        $lastInsertId = $db->lastInsertId();

        return $lastInsertId;
    } catch (PDOException $e) {
        echo "Create operation failed: " . $e->getMessage();
    }
}

// Read operation
function getItems()
{
    global $db;

    try {
        // Prepare the SQL statement
        $stmt = $db->prepare("SELECT * FROM imahge_gallery");

        // Execute the statement
        $stmt->execute();

        // Fetch all the items as an associative array
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $items;
    } catch (PDOException $e) {
        echo "Read operation failed: " . $e->getMessage();
    }
}

// Update operation
function updateItem($id, $name, $imageDir)
{
    global $db;

    try {
        // Prepare the SQL statement
        $stmt = $db->prepare("UPDATE 'images' SET name = :name, image_dir = :imageDir WHERE id = :id");

        // Bind the parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':imageDir', $imageDir);

        // Execute the statement
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Update operation failed: " . $e->getMessage();
    }
}

// Delete operation
function deleteItem($id)
{
    global $db;

    try {
        // Prepare the SQL statement
        $stmt = $db->prepare("DELETE FROM 'image' WHERE id = :id");

        // Bind the parameter
        $stmt->bindParam(':id', $id);

        // Execute the statement
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Delete operation failed: " . $e->getMessage();
    }
}

// Example usage

// Create a new item
$newItemId = createItem("Item Name", "path/to/image/dir");
echo "New item ID: " . $newItemId . "<br>";

// Get all items
$items = getItems();
foreach ($items as $item) {
    $id = $item['id'];
    $name = $item['name'];
}

