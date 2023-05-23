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

    $sql = "SELECT * FROM bookcart";
    $result = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BooksCart</title>
        <body background="https://wallpapertag.com/wallpaper/full/4/d/4/435896-plain-blue-background-wallpaper-1920x1080-for-ipad.jpg">



    </head>
    <body>
    <?php include('../View/Adminbar.php') ?>
    <fieldset style="width: 60%; height: 450px; overflow: scroll;">
        <legend><b>BooksCart</b></legend>
        <h3 align="center">Books to Cart</h3>
        
        <div align='right'>
            <form action="../Controller/searchbookscart.php" method="get" onsubmit="bookscart(this); return false;">
                🔎<input type="text" id="search" name="Search" placeholder="Search Book">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
        <br>    
        <div id="records" align="center">
            <table border="1" align="center">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Author Name</th>
                        <th>Publication Date</th>
                         <th>Book Quantity</th>
                        <th>Payment Method</th>
                        <th>Coupon Code</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($data = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $data['ID'] . "</td>";
                                echo "<td>" . $data['Book Name'] ."</td>";
                                echo "<td>" . $data['Author Name'] . "</td>";
                                echo "<td>" . $data['Publication Date'] . "</td>";
                                echo "<td>" . $data['Book Quantity'] . "</td>";
                                echo "<td>" . $data['Payment Method'] . "</td>";
                                echo "<td>" . $data['Coupon Code'] . "</td>";
                                echo "<td>" . "<a href='/ProjectDH/Controller/DeleteActionBookscart.php?id=" . $data['ID'] . "'>Delete</a></td>";
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
                            echo "<td>--</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
        <p style="text-align: center;"><a href="/ProjectDH/View/Addbook.php">Add a Book</a></p>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>

    <script>
        function bookscart(stdnt) {
            let search = stdnt.search.value;
			let resulturl = stdnt.action;

			if(search !== "") {
				let xhttp = new XMLHttpRequest();
				xhttp.onload = function(){
					document.getElementById('records').innerHTML = this.responseText;
				}

				xhttp.open("GET", resulturl + "?bookscart=" + search);
				xhttp.send();
			}
            else {
                alert('Empty Search!');
            }
        }
    </script>
    </body>
</html>