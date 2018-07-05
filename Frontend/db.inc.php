<?php
    
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "mayurarya";
    $dbName = "mysql";
    

    try{
        $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    } catch(Exception $e){
        echo "Connection failed : <br>" . $e->getMessage();
    }
?>
