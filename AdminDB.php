<?php 
    require 'Connect.php';

    function update($phone, $email, $address,$username) {
        $ezl = connect();
        $sql = "UPDATE admin SET Contact='$phone', Email='$email', Address='$address',User Name='$username' WHERE CompanyName='BReads'";
        
        $_SESSION['username'] = $username;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;

        $qry = $ezl->query($sql);
        $ezl->close();
    }

    function chng_password($password) {
        $ezl = connect();
        $sql = "UPDATE admin SET Password='$password'";
        $qry = $ezl->query($sql);

        $ezl->close();
    }
    
    function news($news, $date) {
        $ezl = connect();
        $sql = "INSERT INTO news (Date, News) VALUES ('$date', '$news')";
        $result = $ezl->query($sql);

        $ezl->close();
    }

    function delete($id) {
        $ezl = connect();
        $sql = "DELETE FROM news WHERE ID=$id";
        $qry = $ezl->query($sql);
    }

    function deletequery($id) {
        $ezl = connect();
        $sql = "DELETE FROM query WHERE ID=$id";
        $qry = $ezl->query($sql);
    }
?>