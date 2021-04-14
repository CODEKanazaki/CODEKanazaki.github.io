<?php session_start(); 
if (isset($_SESSION['username'])) {
    header("Location: http://localhost/website/profile1.php");
}
?>
<html>
    <head>
        <title>Login</title>
        <link href="admin/backlogin.css" rel="stylesheet" type="text/css"/>
    </head>
    
<body class="bg">
    <form action="" method="POST">
        <div class="demo-table">
        <div class="form-head"> Login</div>
            <hr>

            <div class="field-column">
                <label>Username</label>
                <div>
                    <input placeholder="Enter a user name" required type="text" class="demo-input-box" name="username" value="">
                </div>
            </div>
            
            <div class="field-column">
                <label>Password</label>
                <div>
                    <input placeholder="Enter password" required type="password" class="demo-input-box" name="password" value="">
                </div>
            </div>
           
            <div><input type="submit" name="login-user" value="Login" class="btnRegister">
            <a class= "white">Don't have an account? <a class="yellow" href="register.php">Sign up</a>
            </div>
        </div>
            
                      
            
        </div>


            
    </form>

    <?php

        $conn = mysqli_connect('localhost','root','','website');
            
            
        if(isset($_POST['login-user'])){
            $user_name = $_POST['username'];
            $pass = $_POST['password'];


            $select = "SELECT * FROM user WHERE user = '$user_name'";

            $run = mysqli_query($conn,$select);
            $row_user = mysqli_fetch_array($run);
                
                $db_user = $row_user['user'];
                $db_pass = $row_user['pass'];

            if($user_name == $db_user && $pass == $db_pass){
                // echo '<script>window.open('profile1.php');</script>';
                $_SESSION['username'] = $db_user;
                header("Location: http://localhost/website/profile1.php");
            }else{
                echo '<script type="text/javascript">';
                echo ' alert("Wrong Password")';  //not showing an alert box.
                echo '</script>';
            }
            
        }

    ?>


</body>
</html>