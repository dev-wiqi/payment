<?php
    $server = "localhost";
    $username = "root";
    $password = "b6152kuy";
    $db = "wq_wiqico_master";
            
    $conn = new mysqli($server,$username,$password,$db);
    
    if ($conn->connect_error){
        die("Connection database failed:".$conn->connect_error);
    }
?>
