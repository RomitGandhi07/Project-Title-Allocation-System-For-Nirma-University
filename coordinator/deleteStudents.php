<?php
    include 'header.php';
    include 'connection.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
        $sql = "DELETE FROM students WHERE id='$id'";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Deleted...');</script>";
        }
        else{
            echo "<script>alert('Something Went Wrong !');</script>";
        }
        echo "<script>window.location.replace('students.php');</script>";
    }
 ?>
