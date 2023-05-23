<?php 
	require '../Model/PaymentDB.php';

	if(isset($_GET['payment'])) {
		$name = $_GET['payment'];
		$result = get($name);
	}

	if ($result->num_rows > 0) {
		echo "<table border='1' align='center'>";
		echo "<tr>";
        echo "<td>" . $data['Id'] . "</td>";
                                echo "<td>" . $data['Book'] . "</td>";
                                echo "<td>" . $data['Price'] . "</td>";
                                echo "<td>" . $data['Quantity'] . "</td>";
                                echo "<td>" . $data['Payment'] . "</td>";
                                echo "<td>" . $data['Coupon'] . "</td>";
		while ($data = $result->fetch_assoc()) {
            echo "</tr>";
	        echo "<tr>";
            echo "<td>" . $data['Id'] . "</td>";
                                echo "<td>" . $data['Book'] . "</td>";
                                echo "<td>" . $data['Price'] . "</td>";
                                echo "<td>" . $data['Quantity'] . "</td>";
                                echo "<td>" . $data['Payment'] . "</td>";
                                echo "<td>" . $data['Coupon'] . "</td>";
            echo "<td><a href='/ProjectDH/Controller/DeleteActionPayment.php?id=" . $data['ID'] ."'>Delete</a></td>";
            echo "</tr>";
	    }
	    echo "</table>";
	}
	else {
		echo "No record(s) found";
	}
?>