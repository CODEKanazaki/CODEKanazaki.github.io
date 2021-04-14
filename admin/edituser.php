<html>
    <head>
        <title>Edit</title>
        <link href="back.css" rel="stylesheet" type="text/css" />
    </head>
    
<body class="bg">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="demo-table">
        <div class="form-head">Edit Info</div>

        <?php

        $conn = mysqli_connect('localhost','root','','website');
        if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
           
        $select = "SELECT * FROM user where id ='$edit_id'";

        $run = mysqli_query($conn,$select);
        $row_user = mysqli_fetch_array($run);
            
            $firstname = $row_user['firstname'];
            $middlename = $row_user['middlename'];
            $lastname = $row_user['lastname'];        
            $user = $row_user['user'];
            $pass = $row_user['pass'];
            $email = $row_user['email'];
            $birthday = $row_user['birthday'];
            $user_address = $row_user['user_address'];
            $user_image = $row_user['user_image'];
            $user_gender = $row_user['user_gender'];
            $covid_status = $row_user['covid_status'];
        }
    
        ?>


            <hr>

            
             <div class="field-column">
                <label>FirstName</label>
                <div>
                    <input placeholder="Enter a first name" required type="text" class="demo-input-box"
                        name="firstname"
                        value="<?php echo $firstname;?>">
                </div>
            </div>
            
            <div class="field-column">
                <label>MiddleName</label>
                <div>
                    <input placeholder="Enter a middle name" required type="text" class="demo-input-box"
                        name="middlename"
                        value="<?php echo $middlename;?>">
                </div>
            </div>
            
            <div class="field-column">
                <label>LastName</label>
                <div>
                    <input placeholder="Enter a last name" required type="text" class="demo-input-box"
                        name="lastname"
                        value="<?php echo $lastname;?>">
                </div>
            </div>
            
            
            
        
            
            <div class="field-column">
                <label>Username</label>
                <div>
                    <input placeholder="Enter a user name" required type="text" class="demo-input-box"
                        name="user"
                        value="<?php echo $user;?>">
                </div>
            </div>
            
            <div class="field-column">
            <label>Password</label>
                <div>
                    <input placeholder="Enter password" required type="pass" class="demo-input-box"
                        name="pass" value="<?php echo $pass;?>">
                </div>
            </div>
            <div class="field-column">
                <label>Email</label>
                <div>
                    <input placeholder="Enter email" requiredtype="text" class="demo-input-box"
                        name="email" value="<?php echo $email;?>">
                </div>
            </div>
            
            <div class="field-column">
                <label>Birthday</label>
                <div>
                    <input type="date" class="demo-input-box"
                        name="birthday" value="<?php echo $birthday;?>">
                </div>
            </div>

            <div class="field-column">
                <label>Address</label>
                <div>
                    <input placeholder="Enter address" type="text" class="demo-input-box"
                        name="user_address" value="<?php echo $user_address;?>">
                </div>
            </div>

            <div class="field-column">
                <label>Image: </label>
                <div>
                    <input placeholder="Upload Image" type="file" class="demo-input-box"
                        name="user_image" value="<?php echo $user_image;?>">
                </div>
            </div>


            <div class="field-column">
                    <div class="gender">
                    <p>Gender: </p>
                    <select name ="user_gender">
                        <option value="<?php echo $user_gender;?>"><?php echo $user_gender;?></option>
                        <option value ="Male">Male</option>    
                        <option value ="Female">Female</option>
                    </select>                 
            </div> 


            <div class="field-column">
                <div class="select">
                    <p>COVID Status: </p>
                    <select name ="covid_status">
                        <option value ="Positive">Positive</option>    
                        <option value ="Negative">Negative</option>
                        <!-- ?php echo $covid_status;?> -->
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
                <a class= "white"> <a class="yellow" href="viewuser.php">Back</a>
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

            $efirstname = $_POST['firstname'];
            $emiddlename = $_POST['middlename'];
            $elastname = $_POST['lastname'];        
            $euser = $_POST['user'];
            $epass = $_POST['pass'];
            $eemail = $_POST['email'];
            $ebirthday = $_POST['birthday'];
            $euser_address = $_POST['user_address'];
            $euser_image = $_FILES['user_image']['name'];
            $etmp_name = $_FILES['user_image']['tmp_name'];
            $euser_gender = $_POST['user_gender'];
            $ecovid_status = $_POST['covid_status'];

            if(empty($euser_image)){
                $euser_image = $user_image;
            }
            
            $update = "UPDATE user SET firstname = '$efirstname', middlename = '$emiddlename', lastname = '$elastname', user = '$euser', 
            pass = '$epass', email = '$eemail', birthday = '$ebirthday', user_address = '$euser_address', user_image = '$euser_image',
            user_gender ='$euser_gender', covid_status = '$ecovid_status' WHERE id='$edit_id'";
    
            $run_update = mysqli_query($conn, $update);
            if($run_update === true){
                echo "Data Updated";
                move_uploaded_file($etmp_name,"upload/$euser_image");
            }else
            {
                echo "Failed!".mysqli_error($conn);
            }
    
            }

    ?>
    <a class="btn btn-primary" href ="viewuser.php">View User</a>
</body>
</html>