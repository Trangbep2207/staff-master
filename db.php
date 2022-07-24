<?php
    $conn = new mysqli('localhost', 'root', '','db01');
    
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    } 
?>