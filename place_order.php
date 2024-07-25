<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO orders (name, email, phone, item, instructions) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $item, $instructions);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$item = $_POST['item'];
$instructions = $_POST['instructions'];

if ($stmt->execute()) {
    // Display success message and redirect
    echo "<script>
            alert('Your order has been placed successfully!');
            window.location.href = 'index.html';
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
