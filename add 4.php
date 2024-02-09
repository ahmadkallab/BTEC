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
    
        // collect value of input field
        
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $message = $_REQUEST['message'];
        
        
        $sqlquery = "INSERT INTO products (Pname, color, catID) VALUES ('$name','$email' , '$message' )";
        
        if ($conn->query($sqlquery) == TRUE) {
            echo "record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }  

   }

?>
