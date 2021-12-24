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
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="script/script.js" type="text/javascript"></script>
        <link href="css/forgot.css" rel="stylesheet" type="text/css"/>
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
        
        if(isset($_POST['sub'])){
            $otp2 = $_POST['otp2'];
            $phone2 = $_POST['phone2'];
            $otp3 = $_POST['otp3'];
            
            if($otp2 == $otp3){
        ?>
        <div class="form">
            <form action="updatepass.php" method="post" name="uppass">
                <div class="input" style="background-color: gainsboro;"><i style='font-size:24px' class='far'>&#xf2bd;</i>
                <input type="text" name="phone3" value="<?php echo $phone2 ?>" readonly style="background-color: gainsboro;">
                </div><br/>
                <div class="input"><i class='fas fa-unlock-alt' style='font-size:24px'></i>
                <input type="password" name="password" placeholder="Enter New Password" > 
                </div><br/>
                <div class="input"><i class='fas fa-unlock-alt' style='font-size:24px'></i>
                <input type="password" name="con_pass" placeholder="Re-Enter New Password" >
                </div><br/>
                <input type="submit" value="Update" name="update" >&nbsp;
                Are you want to <a href="login.php"> Cancel?</a>
            </form>
        </div>
        <?php
            }else{
                echo '<script>swal({
                                      title: "Error!",
                                      text: "OPT does not matched!",
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
            <div>
                
            </div>
        </div>
    </body>
</html>
