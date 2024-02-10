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
        $search-bar = $_REQUEST['search-bar'];
    
        $sqlquery = "SELECT * FROM products WHERE Pname LIKE '%$search-bar%'";
    
        $result = $conn->query($sqlquery);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["Pname"]. " , color: " . $row["color"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
?>
