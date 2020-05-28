<?php
    include "dbconnect.php";
    if(!isset($_GET['pid'])){
        header("location: ../index.php");
    }

    $pid = $_GET['pid'];

    if(isset($_POST['update'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        
        $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$pid";
        mysqli_query($connection, $sql);
        header('Location: ../index.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Post</title>
</head>
<body>
    <div class="header">BACHO'S BLOG</div>
    <div class="middle">
        <center><?php
        $sql_get = "SELECT * FROM posts WHERE id=$pid LIMIT 1";
        $res = mysqli_query($connection, $sql_get);

        if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
                $title = $row['title'];
                $content = $row['content'];


            echo "<br><b>UPDATE<b><br><br>";
            echo "<form action='edit.php?pid=$pid' method='post'>";
            echo "<input class='inp1' placeholder='Title' value='$title' type='text' name='title' required minlength='1' maxlength='100'><br><br>";
            echo "<textarea placeholder='Content' name='content' cols='100' rows='10' required minlength='1' maxlength='500'>$content</textarea><br><br>";
            }
        }
        ?>
    
    <input type="submit" name="update" value="UPDATE"><br><br>
    </form></center>
    </div>
    <div class="footer">All Rights Reserved By Bacho Inc©</div>
</body>
</html>