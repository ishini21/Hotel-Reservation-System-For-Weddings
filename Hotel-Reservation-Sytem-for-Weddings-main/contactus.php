<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'contact';

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Update option
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $inquiry = mysqli_real_escape_string($connection, $_POST['inquiry']);
    $comment = mysqli_real_escape_string($connection, $_POST['textarea']);

    // Update the record in the database
    $query = "UPDATE support SET Username = '$username', Inquiry_type = '$inquiry', Message = '$comment' WHERE Id = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect or show success message
        // ...
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Delete option
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Delete the record from the database
    $query = "DELETE FROM support WHERE Id = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect or show success message
        // ...
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $inquiry = mysqli_real_escape_string($connection, $_POST['inquiry']);
    $comment = mysqli_real_escape_string($connection, $_POST['textarea']);

    // Insert the form data into the database
    $query = "INSERT INTO support (Username, Inquiry_type, Message) VALUES ('$username', '$inquiry', '$comment')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect or show success message
        // ...
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Fetch existing records from the database
$query = 'SELECT * FROM support';
$table_list = '';
$table = mysqli_query($connection, $query);

if ($table) {
    while ($row = mysqli_fetch_assoc($table)) {
        $table_list .= "<tr>";
        $table_list .= "<td>{$row['Id']}</td>";
        $table_list .= "<td>" . htmlspecialchars($row['Username']) . "</td>";
        $table_list .= "<td>" . htmlspecialchars($row['Inquiry_type']) . "</td>";
        $table_list .= "<td>" . htmlspecialchars($row['Message']) . "</td>";
        $table_list .= "<td><a href=\"edit.php?id={$row['Id']}\">Edit</a></td>";
        $table_list .= "<td><a href=\"?delete={$row['Id']}\">Delete</a></td>";
        $table_list .= "</tr>";
    }
} else {
    echo "Database query failed";
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact support page</title>
    <link rel="stylesheet" href="../css/newcontact.css">
    <script>
        const form = document.getElementById('login-form');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
                .then(response => response.text())
                .then(data => {
                    const messageElement = document.querySelector('.message');
                    messageElement.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</head>
<body>
<header>
    <h3>Grand Royal Hotel</h3>
    <h1 class="sup">Support</h1>
</header>
<nav>
    <div class="navbar">
        <img src="image/logo.jpg" class="logo">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="package.html">Packages</a></li>
            <li><a href="contactus.html">Contactus</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="login.html">Login</a></li>
        </ul>
    </div>
</nav>
<div class="mainn">
    <div class="container">
        <form id="login-form" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <div class="select">
                <label for="inquiry">Inquiry type:</label>
                <select id="inquiry" name="inquiry" required>
                    <option value=""></option>
                    <option value="General">General</option>
                    <option value="Reservation">Reservation</option>
                    <option value="Payment">Payment</option>
                    <option value="Complaint">Complaint</option>
                </select>
            </div>

            <label for="textarea">Comment:</label>
            <textarea id="textarea" name="textarea" required></textarea>

            <button type="submit" name="submit">Submit</button>
        </form>
        <div class="message"></div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Inquiry Type</th>
            <th>Message</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php echo $table_list; ?>
        </tbody>
    </table>
</div>
<footer>
    <p>&copy; <?php echo date('Y'); ?> Grand Royal Hotel. All rights reserved.</p>
</footer>
</body>
</html>
