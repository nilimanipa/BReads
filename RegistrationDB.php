<?php 
    require 'Connect.php';

    function insert_manager($firstname, $lastname, $gender, $dob, $religion, $preaddress, $paraddress, $phone, $email, $username, $password) {
        $ezl = connect();

        $sql = "INSERT INTO manager(FirstName, LastName, Gender, DateOfBirth, Religion, PresentAddress, PermanentAddress, PhoneNo, Email, Username, Password) VALUES ('$firstname', '$lastname', '$gender', '$dob', '$religion', '$preaddress', '$paraddress', '$phone', '$email', '$username', '$password')";

        if($ezl->query($sql)) {
            header("location: /ProjectDH/View/login.php");
            setcookie('msg', '<b>✅ Registration Successful</b>', time() + 1, '/');
        }
        else {
            echo "Error: " . $sql . "<br>" . $ezl->error;
        }

        $ezl->close();
    }
    
    function insert_customer($name, $gender, $dob, $phone, $email, $username, $password) {
        $ezl = connect();

        $sql = "INSERT INTO customer(Name, Gender, DateOfBirth, Email, Contact, Username, Password) VALUES ('$name', '$gender', '$dob', '$email', '$phone', '$username', '$password')";

        if($ezl->query($sql)) {
            header("location: /ProjectDH/View/Customer.php");
            setcookie('msg', '<b>✅ Registration Successful</b>', time() + 1, '/');
        }
        else {
            echo "Error: " . $sql . "<br>" . $ezl->error;
        }

        $ezl->close();
        header("location: /ProjectDH/View/Customer.php");
    }
?>