<?php 
	require '../Model/OrderDB.php';

	if(isset($_GET['order'])) {
		$name = $_GET['order'];
		$result = get($name);
	}

	if ($result->num_rows > 0) {
		echo "<table border='1' align='center'>";
		echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Book Name</th>";
        echo "<th>Author Name</th>";
        echo "<th>Publication Date</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "<th>Action</th>";
		while ($data = $result->fetch_assoc()) {
            echo "</tr>";
	        echo "<tr>";
            echo "<td>" . $data['ID'] . "</td>";
            echo "<td>" . $data['Book Name'] . "</td>";
            echo "<td>" . $data['Author Name'] . "</td>";
            echo "<td>" . $data['Publication Date'] . "</td>";
            echo "<td>" . $data['Price'] . "</td>";
            echo "<td>" . $data['Quantity'] . "</td>";
            echo "<td>" . "<a href='/ProjectDH/Controller/DeleteActionOrder.php?id=" . $data['ID'] . "'>Delete</a></td>";
            echo "</tr>";
	    }
	    echo "</table>";
	}
	else {
		echo "No record(s) found";
	}
?>
