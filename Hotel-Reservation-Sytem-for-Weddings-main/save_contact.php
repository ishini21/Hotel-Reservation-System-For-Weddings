<?php
// Establish a database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "contact"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    
    $stmt->close( back to the contact page or display a success message
    header("Location: gallary.html");
    exit(););
    $conn->close();


}
?>
