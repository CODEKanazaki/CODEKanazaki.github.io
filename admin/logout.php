<?php 

    session_start();
    $conn = mysqli_connect('localhost','root','','website');

    if(isset($_SESSION['username']))
        echo "<script>window.open('loginadmin.php','_self');</script>";
    

    session_destroy();
    
    


?>