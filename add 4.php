<?php
    $servername = "localhost";
    $username = "id21806474_admin";
    $password = "Root123456789.";
    $dbname = "id21806474_shopdb";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        // collect value of input field
        
        $productName = $_REQUEST['productName'];
        $ProductColor = $_REQUEST['productcolor'];
        $ProductCatID = $_REQUEST['catID'];
        
        
        $sqlquery = "INSERT INTO products (Pname, color, catID) VALUES ('$productName','$ProductColor' , '$ProductCatID' )";
        
        if ($conn->query($sqlquery) == TRUE) {
            echo "record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }  

   }

?>