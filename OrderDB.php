<?php 
    require 'Connect.php';
    
    function delete($id) {
        $ezl = connect();
        $sql = "DELETE FROM orderb WHERE ID=$id";
        $qry = $ezl->query($sql);

        header('location: ../View/Order.php');
    }
    
    function get($name) {
        $conn = connect(); 

        $sql = "SELECT * FROM orderb Where Name LIKE ?";
        $stmt = $conn->prepare($sql);
        $fname = $name;
        $fname = "%" . $fname . "%";
        $stmt->bind_param("s", $fname);

        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();

        return $result;
    }
?>