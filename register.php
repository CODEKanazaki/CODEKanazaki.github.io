<html>
    <head>
        <title>Register</title>
        <link href="back.css" rel="stylesheet" type="text/css" />
    </head>
    
<body class="bg">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="demo-table">
        <div class="form-head">Sign Up</div>
            <hr>

            
             <div class="field-column">
                <label>FirstName</label>
                <div>
                    <input placeholder="Enter a first name" required type="text" class="demo-input-box"
                        name="firstname"
                        value="">
                </div>
            </div>
            
            <div class="field-column">
                <label>MiddleName</label>
                <div>
                    <input placeholder="Enter a middle name" required type="text" class="demo-input-box"
                        name="middlename"
                        value="">
                </div>
            </div>
            
            <div class="field-column">
                <label>LastName</label>
                <div>
                    <input placeholder="Enter a last name" required type="text" class="demo-input-box"
                        name="lastname"
                        value="">
                </div>
            </div>
            
            
            
        
            
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
                <label>Birthday</label>
                <div>
                    <input type="date" class="demo-input-box"
                        name="birthday" value="">
                </div>
            </div>

            <div class="field-column">
                <label>Address</label>
                <div>
                    <input placeholder="Enter address" type="text" class="demo-input-box"
                        name="user_address" value="">
                </div>
            </div>

            <div class="field-column">
                <label>Image: </label>
                <div>
                    <input placeholder="Upload Image" type="file" class="demo-input-box"
                        name="user_image" value="">
                </div>
            </div>


            <div class="field-column">
                    <div class="gender">
                    <p>Gender: </p>
                    <select name ="user_gender">
                        <option value ="Male">Male</option>    
                        <option value ="Female">Female</option>
                    </select>                 
            </div> 


            <div class="field-column">
                <div class="select">
                    <p>COVID Status: </p>
                    <select name ="covid_status">
                        <option value ="Negative">Negative</option>    
                        <option value ="Positive">Positive</option>
                    </select>        
                </div> 
                
            </div>

          
                
            </div>
            
            <div class="field-column">
                <div class="terms">
                    <input type="checkbox" name="terms" > I accept <a class="yellow" href="terms.php">Terms and conditions</a>

                </div>
            
                <div>
                    <input type="submit"
                        name="Register" value="Register"
                        class="btnRegister">
                </div>
                <a class= "white">Have an Account? <a class="yellow" href="login.php">Login</a>
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

            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];        
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $birthday = $_POST['birthday'];
            $user_address = $_POST['user_address'];
            $user_image = $_FILES['user_image']['name'];
            $tmp_name = $_FILES['user_image']['tmp_name'];
            $user_gender = $_POST['user_gender'];
            $covid_status = $_POST['covid_status'];
            
            $insert = "INSERT INTO user(firstname,middlename,lastname,user,pass,email,birthday,user_address,user_image,user_gender,covid_status) 
            VALUES('$firstname','$middlename','$lastname','$user','$pass','$email','$birthday','$user_address','$user_image','$user_gender',
            '$covid_status')";
    
            $run_insert = mysqli_query($conn, $insert);
            if($run_insert === true){
                echo "Data inserted";
                move_uploaded_file($tmp_name,"admin/upload/$user_image");

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