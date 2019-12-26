<?php
    include 'header.php';
    include 'connection.php';
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
        $sql = "DELETE FROM project_titles WHERE id='$id'";
        if (mysqli_query($con, $sql)) {
            // echo "<script>alert('Title Deleted !');</script>";
        }
        else{
            echo "<script>alert('Something Went Wrong !');</script>";
        }
        $sql2 = "DELETE FROM titles_allocated WHERE title_id=$id";
        if (mysqli_query($con, $sql2)) {
            echo "<script>alert('Title Deleted !');</script>";
            header('Location:viewTitles.php');
            // echo $sql2;
        }
        else{
            echo "<script>alert('Something Went Wrong !');</script>";
        }
    }
 ?>
