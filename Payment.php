<?php 
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectDH/Controller/Logout.php');
    }
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectDH/View/login.php");
    }

    $ezl = new mysqli("localhost", "root", "", "breads");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM payment";
    $qry = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
   
</head> <body background="https://wallpapertag.com/wallpaper/full/4/d/4/435896-plain-blue-background-wallpaper-1920x1080-for-ipad.jpg">
>
<body>
    <?php include('../View/Adminbar.php') ?>
    
    <fieldset style="width: 60%; height: 450px; overflow: scroll;">
        <legend><b>Payment Details</b></legend>
        <h3 align="center">Payment Details</h3>
        <div align='right'>
            <form action="../Controller/searchpayment.php" method="get" onsubmit="payment(this); return false;">
                🔎<input type="text" id="search" name="Search" placeholder="Search Payment Id">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
        <br>
 
        <div id="records" align="center">
            <table border="1" align="center">
                <tbody>
                    <tr>
                        <th>Payment Id</th>
                        <th>Book Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Payment Method</th>
                        <th>Coupon Code</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        if ($qry->num_rows > 0) {
                            while ($data = $qry->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $data['ID'] . "</td>";
                                echo "<td>" . $data['Book'] . "</td>";
                                echo "<td>" . $data['Price'] . "</td>";
                                echo "<td>" . $data['Quantity'] . "</td>";
                                echo "<td>" . $data['Payment'] . "</td>";
                                echo "<td>" . $data['Coupon'] . "</td>";

                                echo "<td><a href='/ProjectDH/Controller/DeleteActionPayment.php?id=" . $data['ID'] ."'>Delete</a></td>";
                                echo "</tr>";
                            }
                        }
                        else {
                            echo "<tr>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "</tr>";
                        }
                        $ezl->close();
                    ?>
                </tbody>
            </table>
        </div>
        <p style="text-align: center;"><a href="/ProjectDH/View/PaymentReq.php">Payment Requests</a></p>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>

    <script>
        function payment(stdnt) {
            let search = stdnt.search.value;
			let resulturl = stdnt.action;

			if(search !== "") {
				let xhttp = new XMLHttpRequest();
				xhttp.onload = function(){
					document.getElementById('records').innerHTML = this.responseText;
				}

				xhttp.open("GET", resulturl + "?payment=" + search);
				xhttp.send();
			}
            else {
                alert('Empty Search!');
            }
        }
    </script>
</body>
</html>