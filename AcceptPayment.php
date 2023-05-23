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
            define("file", "../Model/tempPayment.json");
            if (isset($_GET['sl'])) {		
                $id = $_GET['sl'];

                $handle = fopen(file, "r");
                $fr = fread($handle, filesize(file));
                $arr1 = json_decode($fr);
                $fc = fclose($handle);

                for($i = 0; $i < count($arr1); $i++) {
                    if(+$id === $arr1[$i]->sl) {
                        $price = $arr1[$i]->price;
                        $location = $arr1[$i]->location;
                        $details = $arr1[$i]->details;

                    }
                }
                
                $ezl = new mysqli("localhost", "root", "", "breads");
                if ($ezl->connect_error) {
                    die("Data base Connection failed: " . $ezl->connect_error);
                }

                $sql = "INSERT INTO payment(ID, Price, Location, Details) VALUES ('$id', '$price', '$location', '$details')";
                $qry = $ezl->query($sql);

                $handle = fopen(file, "w");
                $arr2 = array();
                for ($i = 0; $i < count($arr1); $i++) {
                    if (+$id !== $arr1[$i]->sl) {
                        array_push($arr2, $arr1[$i]);
                    }
                }

                $data = json_encode($arr2);
                $fw = fwrite($handle, $data);
                $fc = fclose($handle);

                header('location: /ProjectDH/View/Payment.php');
            }
            else {
                die("Invalid Request");
            }
            echo "<h3>✅Payment Approved</h3><br>";
        ?>
        <a href="/ProjectDH/View/Payment.php">Go Back</a>
    </fieldset>
    

    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
</body>
</html>