<?php
    if(isset($_POST['post'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        
        $sql = "INSERT INTO posts (title, content)
        VALUES ('$title',
        '$content')"; 
        mysqli_query($connection, $sql);
        header('Location: index.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Post</title>
</head>
<body>
    <center><article class="post">
    <br><b>POST SOMETHING<b>
    <form action="" style = "padding:20px" method="post">
    <input class="inp1" placeholder="Title" type="text" name="title" required minlength="1" maxlength="100"><br><br>
    <textarea placeholder="Content" name="content" cols="100" rows="10" required minlength="1" maxlength="500"></textarea><br>
    <br>
    <input type="submit" name="post" value="POST">
    </form>
    </article></center>
</body>
</html>