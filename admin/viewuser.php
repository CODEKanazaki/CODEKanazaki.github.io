<?php 

    session_start();
    $conn = mysqli_connect('localhost','root','','website');

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        header("Location: http://localhost/website/admin/loginadmin.php");
    }
    
    // if(isset($_SESSION['username'])){
    //     echo "<script>window.open('profile1.php','_self');</script>";
    // }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <h2>User Information</h2>
  <a href="http://localhost/website/admin/logout.php" class="btn btn-danger">LOGOUT</a>
    <?php

        $conn = mysqli_connect('localhost','root','','website');
        if(isset($_GET['del'])){
            $del_id = $_GET['del'];
            $delete = "DELETE  FROM user WHERE id='$del_id'";
            $run_delete = mysqli_query($conn,$delete);
                if($run_delete === true){
                    echo "RECORD DELETED";
                }else{
                    echo "Failed!";
                }
        }
    
    ?>
      
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>firstname</th>
        <th>middlename</th>
        <th>lastname</th>
        <th>user</th>
        <th>pass</th>
        <th>email</th>
        <th>birthday</th>
        <th>user_address</th>
        <th>user_image</th>
        <th>user_gender</th>
        <th>covid_status</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>

    <?php
        $conn = mysqli_connect('localhost','root','','website');
        $select = "SELECT * FROM user";

        $run = mysqli_query($conn,$select);
        while($row_user = mysqli_fetch_array($run)){;
            $id = $row_user['id'];
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
    ?>


      <tr>
        <td><?php echo $id;?></td>
        <td><?php echo $firstname;?></td>
        <td><?php echo $middlename;?></td>
        <td><?php echo $lastname;?></td>
        <td><?php echo $user;?></td>
        <td><?php echo $pass;?></td>
        <td><?php echo $email;?></td>
        <td><?php echo $birthday;?></td>
        <td><?php echo $user_address;?></td>
        <td><img src = "upload/<?php echo $user_image;?>"height="70px"></td>
        <td><?php echo $user_gender;?></td>
        <td><?php echo $covid_status;?></td>
        <td><a class="btn btn-danger" href="viewuser.php?del=<?php echo $id;?>">Delete</a><td>
        <td><a class="btn btn-success" href="edituser.php?edit=<?php echo $id;?>">Edit</a><td>
      </tr>
      <?php
      
        }
      
      
      
      ?>
      
    </tbody>
  </table>
</div>

</body>
</html>
