<?php
$servername = "kallabbakery-server.mysql.database.azure.com";
$username = "dgadequuds";
$password = "4VUACNNA3J3502FX$";
$dbname = "kallabbakery-database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare a statement
    $stmt = $conn->prepare("INSERT INTO products (column1, column2, column3) VALUES (?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sss", $name, $email, $message);

    // Set parameters and execute
    $stmt->execute();

    // Check for success
    if ($stmt->affected_rows > 0) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
