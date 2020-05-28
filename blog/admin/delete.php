<?php
    session_start();
    include "dbconnect.php";

        $pid = $_GET['pid'];
        $sql = "DELETE FROM posts WHERE id=$pid";
        mysqli_query($connection, $sql);
        header("location: ../index.php");
?>