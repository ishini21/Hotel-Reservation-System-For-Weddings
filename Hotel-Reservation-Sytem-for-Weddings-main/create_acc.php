<?php

<?php
$servername = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'create_acc';

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];

$stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssis", $firstname, $lastname, $gender, $email, $password, $phonenumber);
$stmt->execute();
echo "Registered successfully";
$stmt->close();
$conn->close();
?>
