<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectDH/View/login.php");
    }

    require '../Model/PaymentDB.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Action</title>
</head>
<body> 
    <?php include('../View/Adminbar.php'); ?>
    <fieldset style="width: 50%; height: 450px;">
        <legend><b>Payment Details</b></legend>
        <?php
            if (isset($_GET['id'])) {		
                $id = $_GET['id'];

                delete($id);
            }
            else {
                die("Invalid Request");
            }   
            echo "✅Payment Details Removed<br>";
        ?>
        <a href="/ProjectDH/View/Payment.php">Go Back</a>
    </fieldset>
    
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
</body>
</html>