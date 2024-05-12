<?php
// admin_login.php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // Validate the admin credentials (you can replace this with your own validation logic)
    if ($admin_username === 'admin' && $admin_password === 'admin123') {
        // Redirect the admin to the admin display page
        header('Location: admin_display.php');
        exit;
    } else {
        // Invalid credentials, show error message or redirect back to login page
        echo 'Invalid username or password.';
    }
}
?>
