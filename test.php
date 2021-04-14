
<?php 

    session_start();
    $conn = mysqli_connect('localhost','root','','website');

    if(isset($_SESSION['username'])){
        echo "<script>window.open('index.php','_self');</script>";
    }else if(!isset($_SESSION['username'])){ 

        header("location:login.php");
    }
    


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <a class= "btn btn-danger" href="login.php">Logout</a>
        <link href="back.css" rel="stylesheet" type="text/css" />
    </head>
    
<body class="bg">
        <div class="demo-table">

            <div class="form-head">Home</div>
            
            <div class="field-column">

            </div>

        </div>
    
  
</body>
</html>