<?php 
    require 'Connect.php';
    
    function delete($id) {
        $ezl = connect();
        $sql = "DELETE FROM bookscart WHERE ID=$id";
        $qry = $ezl->query($sql);

        header('location: ../View/Bookscart.php');
    }
    
    function get($firstname) {
        $conn = connect(); 

        $sql = "SELECT * FROM bookscart Where FirstName LIKE ?";
        $stmt = $conn->prepare($sql);
        $fname = $firstname;
        $fname = "%" . $fname . "%";
        $stmt->bind_param("s", $fname);

        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();

        return $result;
    }
?>