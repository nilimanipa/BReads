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
        <legend><b>Customer</b></legend>
        <?php
            define("file", "../Model/tempCustomer.json");
            if (isset($_GET['sl'])) {		
                $id = $_GET['sl'];

                $handle = fopen(file, "r");
                $fr = fread($handle, filesize(file));
                $arr1 = json_decode($fr);
                $fc = fclose($handle);

                for($i = 0; $i < count($arr1); $i++) {
                    if(+$id === $arr1[$i]->sl) {
                        $name = $arr1[$i]->name;
                        $gender = $arr1[$i]->gender;
                        $dob = $arr1[$i]->dob;
                        $phone = $arr1[$i]->phone;
                        $email = $arr1[$i]->email;
                        $username = $arr1[$i]->username;
                        $password = $arr1[$i]->password;
                    }
                }
                
                $ezl = new mysqli("localhost", "root", "", "dream house");
                if ($ezl->connect_error) {
                    die("Data base Connection failed: " . $ezl->connect_error);
                }

                $sql = "INSERT INTO customer(Name, Gender, DateOfBirth, Contact, Email, Username, Password) VALUES ('$name', '$gender', '$dob', '$phone', '$email', '$username', '$password')";
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

                header('location: /ProjectDH/View/Customer.php');
            }
            else {
                die("Invalid Request");
            }
            echo "<h3>✅Customer Approved</h3><br>";
        ?>
        <a href="/ProjectDH/View/Customer.php">Go Back</a>
    </fieldset>
    

    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
</body>
</html>