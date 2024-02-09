<?php
    $servername = "kallabbakery-server.mysql.database.azure.com";
    $username = "dgadequuds";
    $password = "4VUACNNA3J3502FX$";
    $dbname = "kallabbakery-database";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        // Collect values from the form
        $pname = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        // Replace with the actual column names in your 'products' table
        $sqlquery = "INSERT INTO products (column1, column2, column3) VALUES ('$pname', '$email', '$message')";
        
        if ($conn->query($sqlquery) == TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sqlquery . "<br>" . $conn->error;
        }
    }
?>
