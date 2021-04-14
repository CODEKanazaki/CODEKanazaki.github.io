<?php 

    session_start();
    $conn = mysqli_connect('localhost','root','','website');

    if(isset($_SESSION['username'])){
        echo "<script>window.open('profile.php','_self');</script>";
    }
    
    

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link href="newback.css" rel="stylesheet" type="text/css"/>
    </head>
<body class="bg">
    
    <div class="demo-table">
    <div class="container">

    <form action="" method="POST">
        <button class="edit" name="test">Request Edit</button>
    </form>

    <?php
    
        $q= mysqli_query($conn,"SELECT * FROM user WHERE user = '$_SESSION[username]'");
    
    
    ?>
    <h2>info</h2>

    <?php 
    
        $row=mysqli_fetch_assoc($q);

      
    
    ?>
    <h4>
    <?php echo $_SESSION['username'];?>
    </h4>


    </div>

    <?php
        
            echo "<table>";
                echo "<tr>";
                    echo "<td>";
                        echo "<b> First Name: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['firstname'];
                    echo "</td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>";
                        echo "<b> Middle Name: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['middlename'];
                    echo "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b> Last Name: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['lastname'];
                    echo "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b> Email: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['email'];
                    echo "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b> birthday: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['birthday'];
                    echo "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b> Address: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['user_address'];
                    echo "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b> Gender: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['user_gender'];
                    echo "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>";
                        echo "<b> COVID Status: </b>";
                    echo "</td>";

                    echo "<td>";
                        echo $row['covid_status'];
                    echo "</td>";
                echo "</tr>";

            echo "<table>";
    
    
    
    
    
    
    ?>
    


        
  
</body>
</html>