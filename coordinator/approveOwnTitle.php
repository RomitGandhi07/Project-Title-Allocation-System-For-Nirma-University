<?php
    include 'header.php';
    include 'connection.php';
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
        $sql = "UPDATE own_titles SET flag=2 WHERE id='$id'";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Title Approved !');</script>";
        }
        else{
            echo "<script>alert('Something Went Wrong !');</script>";
        }
        echo "<script>window.location.replace('ownTitles.php');</script>";
    }
 ?>
