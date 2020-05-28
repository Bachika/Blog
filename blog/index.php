<?php
    session_start();
    include "admin/dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">BACHO'S BLOG</div>
    <div class="middle">
    <?php
        include "admin/post.php";
        $sql = "SELECT * FROM posts ORDER BY id DESC";
        $res = mysqli_query($connection, $sql) or die(mysqli_error());
        $posts = "";

        if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['title'];
                $content = $row['content'];

                $admin = "<div><a href='admin/delete.php?pid=$id'>DELETE</a>&nbsp;
                          <a href='admin/edit.php?pid=$id'>EDIT </a></div>";

                $posts .= "<div style='border-bottom:2px solid darkcyan; padding:10px;'><h2><a href='view_post.php?pid=$id'>$title</a></h2><p>$content</p>$admin</div>";
            }
            echo $posts;
        }else{
            echo "There are no posts";
        }
    ?>
    </div>
    <div class="footer">All Rights Reserved By Bacho Inc©</div>
</body>
</html>