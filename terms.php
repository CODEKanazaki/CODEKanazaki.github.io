<html>
    <head>
        <title>Terms and Conditions</title>
        <link href="term.css" rel="stylesheet" type="text/css" />
    </head>
    
<body class="bg">
    <form name="frmRegistration" method="post" action="">
        <div class="demo-table">
        <div class="form-head">Terms and Condition</div>
            <hr>

            
<?php
if (! empty($errorMessage) && is_array($errorMessage)) {
    ?>	
            <div class="error-message">
            <?php 
            foreach($errorMessage as $message) {
                echo $message . "<br/>";
            }
            ?>
            </div>
<?php
}
?>       
           <div class="form-head">
               
               The Intellectual Property disclosure will inform users that the contents, logo and other visual media you created is your property and is protected by copyright laws.
               
            <hr>
                <div >
                    <a class="yellow" href="register.php">BACK</a>

                </div>
            </div>
        </div>    
    </form>
</body>
</html>