<html>
    <head>
        <title>Register</title>
        <link href="back.css" rel="stylesheet" type="text/css" />
    </head>
    
<body class="bg">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="demo-table">
        <div class="form-head">Admin Sign Up</div>
            <hr>

         
            <div class="field-column">
                <label>Username</label>
                <div>
                    <input placeholder="Enter a user name" required type="text" class="demo-input-box"
                        name="user"
                        value="">
                </div>
            </div>
            
            <div class="field-column">
            <label>Password</label>
                <div>
                    <input placeholder="Enter password" required type="pass" class="demo-input-box"
                        name="pass" value="">
                </div>
            </div>
            <div class="field-column">
                <label>Email</label>
                <div>
                    <input placeholder="Enter email" requiredtype="text" class="demo-input-box"
                        name="email" value="">
                </div>
            </div>
            
            
            <div class="field-column">
                <div class="terms">
                    <input type="checkbox" name="terms" > I accept <a class="yellow" href="website/terms.php">Terms and conditions</a>

                </div>
            
                <div>
                    <input type="submit"
                        name="Register" value="Register"
                        class="btnRegister">
                </div>
                <a class= "white">Have an account? <a class="yellow" href="loginadmin.php">Login</a>
            </div>
        </div>
    </form>
    <?php

        $conn = mysqli_connect('localhost','root','','website');

        // if(mysqli_connect_errno()){
        //     echo "connection fail";
        // }else{
        //     echo "connection success";
        // }
        
        if(isset($_POST['Register'])){
 
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            
            $insert = "INSERT INTO adminn(user,pass,email) 
            VALUES('$user','$pass','$email')";
    
            $run_insert = mysqli_query($conn, $insert);
            if($run_insert === true){
                echo "Data inserted";
                echo '<script type="text/javascript">';
                echo ' alert("Registered!")';  //not showing an alert box.
                echo '</script>';
            }else
            {
                echo "Failed!";
            }
    
            }
        

        

    ?>
   
</body>
</html>