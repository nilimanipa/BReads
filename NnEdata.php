<?php 
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectDH/Controller/Logout.php');
    }
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectDH/View/login.php");
    }

    require '../Model/Connect.php';

    $ezl = connect();
    $sql = "SELECT * FROM news";
    $result = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Review</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    <fieldset style="width: 50%; height: 100%; float: left; overflow: scroll ;">
        <legend><b>Book Review</b></legend>
        <br>
        <form action="/ProjectDH/Controller/NnEAction.php"  method="POST">
            <table border="1" align="center">
                <tbody>
                    <tr>
                        <th>Date</th>
                        <th>Review</th>
                        <th>Action</th> 
                    </tr>
                    <?php 
                        if ($result->num_rows > 0) {
                            while ($data = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $data['Date'] . "</td>";
                                echo "<td>" . $data['News'] . "</td>";
                                echo "<td>" . "<a href='/ProjectDH/Controller/DeleteNnE.php?id=" . $data['ID'] . "'>Delete</a></td>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </form>
        <br>
        <a href="/ProjectDH/View/NnE.php"><p style="text-align: center;">Add a Review</p></a>
    </fieldset>

    <br>
    <fieldset style="width: 98%;">
        <?php 
            include '../View/Footer.php'; 
        ?>
    </fieldset>
</body>
</html>