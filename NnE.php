<?php 
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectDH/Controller/Logout.php');
    }
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectDH/View/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../View/js/admin.js"></script>
    <title>Book Review</title>
</head>
<body>
       <body background="https://wallpapertag.com/wallpaper/full/4/d/4/435896-plain-blue-background-wallpaper-1920x1080-for-ipad.jpg"> 
    <?php include('../View/Adminbar.php') ?>
    <fieldset style="width: 50%; height: 100%; float: left;">
        <legend><b>Book Review</b></legend>
        <br>
        <form action="/ProjectDH/Controller/NnEAction.php"  method="POST" onsubmit="return validnews(this)">
            <?php
                if(isset($_COOKIE['msg'])) {
                    echo $_COOKIE['msg'];
                }
            ?>
            <span id="newsErr"></span>
            <table>
                <tr>
                    <td>
                        <input type="date" name="date" value="<?php echo date('Y-m-d') ?>" hidden>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="news">Write a Review :</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="news" id="news" cols="80" rows="10"></textarea>
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Post">
        </form>
        <br>
        <a href="/ProjectDH/View/NnEdata.php"><p style="text-align: center;">See all</p></a>
    </fieldset> 
    <fieldset style="width: 98%;">
        <?php 
            include '../View/Footer.php';
        ?>
    </fieldset>
</body>
</html>