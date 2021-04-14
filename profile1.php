<?php 

    session_start();
    $conn = mysqli_connect('localhost','root','','website');

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        header("Location: http://localhost/website/login.php");
    }
    
    // if(isset($_SESSION['username'])){
    //     echo "<script>window.open('profile1.php','_self');</script>";
    // }
    
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

    <form action="http://localhost/website/mail.php" method="POST">
        <button class="edit" name="test">Request Edit</button></a>
        <!-- <a href="http://localhost/website/mail.php"class ="edit">Request Edit</a> -->
        
        <!-- <a href="http://localhost/website/logout.php"class="edit">LOGOUT</a> -->
        
        
    </form>
        
        <a href="http://localhost/website/logout.php"class="logout">LOGOUT</a>
    <?php
        $q= mysqli_query($conn,"SELECT * FROM user WHERE user = '$username'");
    
    ?>

    
    <?php 

        $row=mysqli_fetch_assoc($q);

    ?>

    </div>

    <div class="table">
        
        <?php
            
                echo "<table>";
                    echo "<tr>";
                    
                        echo "<td>";
                            echo '<span style="color:#AFA;font-size:15px; face="Arial"><b> First Name: </b></span>';
                        echo "</td>";

                        

                        echo "<td>";
                            echo $row['firstname'];
                        echo "</td>";
                    echo "</tr>";
        ?>
    </div>
    
    <div class="table1">
        <?php
                    echo "<tr><tr>";
                        echo "<td>";
                            echo '<span style="color:#AFA;font-size:15px; face="Arial"> <b> Middle Name: </b> </span>';
                        echo "</td>";

                        echo "<td>";
                            echo $row['middlename'];
                        echo "</td>";
                    echo "</tr></tr>";
        ?>
    </div>

        <?php
                    echo "<tr>";
                        echo "<td>";
                            echo '<span style="color:#AFA;font-size:15px; face="Arial"><b> Last Name: </b></span>';
                        echo "</td>";

                        echo "<td>";
                            echo $row['lastname'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";
                            echo '<span style="color:#AFA;font-size:15px; face="Arial">"<b> Email: </b></span>';
                        echo "</td>";

                        echo "<td>";
                            echo $row['email'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";
                            echo '<span style="color:#AFA;font-size:15px; face="Arial"><b> birthday: </b></span>';
                        echo "</td>";

                        echo "<td>";
                            echo $row['birthday'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";
                            echo '<span style="color:#AFA;font-size:15px; face="Arial"><b> Address: </b></span>';
                        echo "</td>";

                        echo "<td>";
                            echo $row['user_address'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>";
                            echo '<span style="color:#AFA;font-size:15px; face="Arial"><b> Gender: </b></span>';
                        echo "</td>";

                        echo "<td>";
                            echo $row['user_gender'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    
                        echo "<td>";
                            echo '<span style="color:#AFA;font-size:15px; padding: 50px 0px 0px 0px;face="Arial"><b> COVID Status: </b></span>';
                        echo "</td>";

                        echo "<td>";
                            echo $row['covid_status'];
                        echo "</td>";
                    echo "</tr>";

                echo "<table>";
        ?>
        </div>
    </div>

        
  
</body>
</html>