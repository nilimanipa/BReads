
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signin</title>
        <style>

            fieldset {
                width: 500px;
            }
        </style>
    </head>

    <body background="https://e0.pxfuel.com/wallpapers/231/853/desktop-wallpaper-light-color-beautiful-solid-color-background-for-you-left-of-the-hudson-pink-solid-color.jpg">
>
    <body>
        <?php
    session_start();
    if(isset($_SESSION['username'])) {
        if($_SESSION['username'] == 'nipa')
            header("Location: /ProjectDH/View/Admin.php");
        else 
        header("Location: /Project1/View/dashboard.php");
    }
    $username = $password = "";
        $usernameErr = $passwordErr = "";
        $isValid = true;



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if (!isset($_POST['username']) || empty($_POST['username'])) {
                $usernameErr = "User Name is required";
                $isValid = false;
            }
            else{
                $username = $_POST['username'];
            }

            if (!isset($_POST['password']) || empty($_POST['password'])) {
                $passwordErr = "Password is required";
                $isValid = false;
            }
            else{
                $password = $_POST['password'];
            }
        
            if($isValid) {
                $data = json_decode(file_get_contents('../Model/admin.json'), true);

                if(is_array($data)){
                    $message = "User not found";

                    foreach($data as $key => $value){
                        if ($value['username'] == $_POST['username']) {
                            if ($value['password'] == $_POST['password']) {
                                $_SESSION['data'] = $value;
                                $_SESSION['username'] = $username;
                                header("Location: /ProjectDH/View/Admin.php");
                            }
                            else{
                                $message = "Password does not match";
                            }
                        }
                    }
                }
                else{
                    $message = "User not found";
                }
            }
        }
    
?>


        <?php
        if (isset($message)) {
            echo "$message";
         } 
        ?>

        <fieldset style="width: 98%;">
            <?php include('../View/Header.php'); ?>
            <div style="float: right;">
                <a href="/ProjectDH/View/login.php">Login</a> | <a href="/ProjectDH/Home.php">Home</a>
            </div>
        </fieldset>

        
        <form action="/ProjectDH/Controller/LoginAction.php" target="_self" method="POST" onsubmit="return validlogin(this)">  
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <fieldset style="width: 500px; margin-left: auto; margin-right: auto;">

                <legend><h3>SignIn</h3></legend>
                <?php
                    if (isset($_COOKIE['msg'])) {
                        echo $_COOKIE['msg'];
                    }
                ?>
                <span id="msg"></span>
               <table>
                    <tr>
                        <td>
                            <label for="user">Username </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="user" id="user">
                            <span id="userErr" style="color: red;"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="pass" id="pass">
                            <span id="passErr" style="color: red;"></span>
                        </td>
                    </tr>
                </table> 
                <br>
                <input type="checkbox" name="remember" id="rem"><label for="rem">Remember me</label>
                <br><br>
                <input type="submit" name="login" value="Login">
                <a href="/ProjectDH/View/registration.php">Need to registration?</a>
            </fieldset>
        </form>

        <br>
        
        <fieldset style="width: 98%;">
             <br><br><br><br><br><br>
            <?php include '../View/Footer.php'; ?>
        </fieldset>


         <script>
            function validlogin(login) {
            let userErr = document.getElementById("userErr");
            let passErr = document.getElementById("passErr");

            userErr.innerHTML = "";
            passErr.innerHTML = "";

            let user = login.user.value;
            let pass = login.pass.value;

            let isvalid = true;
            let isEmpty = false;
            if(user === "") {
                userErr.innerHTML = "❗Username should not empty!";
                isvalid = false;
                isEmpty = true;
            }
            if(pass === "") {
                passErr.innerHTML = "❗Password should not empty!";
                isvalid = false;
                isEmpty = true;
            }
            return isvalid;
        }
        </script> 
        
    </body>
</html> 

