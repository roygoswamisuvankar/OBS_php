<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quick Cash</title>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link href="css/forgot.css" rel="stylesheet" type="text/css"/>
        <script src="script/script.js" type="text/javascript"></script>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script/script2.js" type="text/javascript"></script>
        <style>
            img{
                position: absolute;
                left: 25%;
                width: 10%;
                height: 20%;
                top: 5%;
            }
            h1{
                position: absolute;
                left: 38%;
                color: #008cba;
                top: 10%;
            }
            
        </style>
        
    </head>
    <body>
       <?php
        include_once 'dbconfig.php';
        
        if(isset($_POST['submit'])){
            $phone = $_POST['phone'];
            $otp = rand();
            echo "<label style='color : grey'>".$otp."</label>";
            $result = mysqli_query($connect, "select *from user2 where phone = $phone");
            
            if(mysqli_num_rows($result)){
                   
                
         ?>
        <div class="form">
            <form action="forgot3.php" method="post" >
                <input type="hidden" name="otp2" value="<?php echo $otp ?>" ><br>
                <div class="input" style="background-color: gainsboro;"><i style='font-size:24px' class='far'>&#xf2bd;</i>
                <input type="text" name="phone2" value="<?php echo $phone ?>" readonly style="background-color: gainsboro;">
                </div><br>
                <div class="input"><i class='fas fa-user-lock' style='font-size:24px'></i>
                    <input type="text" name="otp3" value="" placeholder="Enter OTP" required >
                </div><br>
                <input type="submit" value="Submit" name="sub">
            </form>
        </div>
        <?php
          
           
            }else{
                echo '<script>swal({
                                      title: "Error!",
                                      text: "This username does not exits",
                                      icon: "error"
                                    }).then(function() {
                                            window.location = "forgot.php";
                                    });</script>';
            }
        }
        ?>
        <div>
            <div>
                <img src="image/logo.png" alt=""/><h1>Quick Cash Reset your Password!</h1>
                
            </div>
            
        </div>
    </body>
</html>
