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
        <title>Profile</title>
        
    </head>
    <body background="https://images.wallpaperscraft.com/image/single/gray_color_background_145576_2780x2780.jpg">
>
    <body>
        <?php include('../View/Adminbar.php') ?>

        <fieldset style="width: 40%; height: 100%; float: left; position: relative;">
            <legend><b>Profile</b></legend>
            <div class='edit'>
                <a href="/ProjectDH/View/Update.php">EDIT</a>
            </div>
            <br>
            <table>
                <tr>
                    <td>
                        <label for="name"> Company Name </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['name']; ?>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <label for="username">User Name</label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['username']; ?>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <label for="email">Contact NO. </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['phone']; ?>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <label for="email">Email </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['email']; ?>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <label for="address">Address </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['address']; ?>
                    </td>
                </tr>

            </table>
        </fieldset>
        <br>
        
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>