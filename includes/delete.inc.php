<?php

// Create database connection
$db = mysqli_connect("localhost", "root", "", "loginsystem");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM properties WHERE id = $id";

    if (mysqli_query($db, $sql)) {
        mysqli_close($db);
        header('Location: ../index.php'); 
        exit;
    } else {
        echo "Error deleting record";
    }
}