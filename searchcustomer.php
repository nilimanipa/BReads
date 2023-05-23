<?php 
	require '../Model/CustomerDB.php';

	if(isset($_GET['customer'])) {
		$name = $_GET['customer'];
		$result = get($name);
	}

	if ($result->num_rows > 0) {
		echo "<table border='1' align='center'>";
		echo "<tr>";
        echo "<th>Book ID</th>";
        echo "<th>Name</th>";
        echo "<th>Gender</th>";
        echo "<th>Date of Birth</th>";
        echo "<th>Email</th>";
        echo "<th>Contact No</th>";
        echo "<th>Username</th>";
        echo "<th>Action</th>";
		while ($data = $result->fetch_assoc()) {
            echo "</tr>";
	        echo "<tr>";
            echo "<td>101-" . $data['Book ID'] . "</td>";
            echo "<td>" . $data['Name'] . "</td>";
            echo "<td>" . $data['Gender'] . "</td>";
            echo "<td>" . $data['DateOfBirth'] . "</td>";
            echo "<td>" . $data['Email'] . "</td>";
            echo "<td>" . $data['Contact'] . "</td>";
            echo "<td>" . $data['Username'] . "</td>";
            echo "<td><a href='/ProjectDH/View/EditCustomer.php?id=" . $data['ID'] ."'>Edit</a></td>"; 
            echo "<td><a href='/ProjectDH/Controller/DeleteActionCustomer.php?id=" . $data['ID'] ."'>Delete</a></td>";
            echo "</tr>";
	    }
	    echo "</table>";
	}
	else {
		echo "No record(s) found";
	}
?>