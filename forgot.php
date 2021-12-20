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
        
        <script src="script/script.js" type="text/javascript"></script>
        
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
        <script>
            $(document).ready(function (){
               $("label").hide();
               $("#phone").on("input", function(){
                   var number = "^[0-9]+$";
                   var data = $("#phone").val();
                   if(!data.match(number)){
                       $("label").show();
                   }else if(data.length<10 || data.length>10){
                        $("label").show();
                   }
                   else{
                       $("label").hide();
                   }
               });
            });
        </script>
    </head>
    <body>
        <?php
        // put your code here
        include_once 'dbconfig.php';
        
        if(isset($_POST['submit'])){
            $phone = $_POST['phone'];
            $result = mysqli_query($connect, "select *from user2 where phone = $phone");
            if(mysqli_num_rows($result)){
                header("Location: forgot2.php");
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
            <div>
                <form action="forgot.php" method="post" name="myforgot">
                    <input type="text" name="phone" placeholder="Enter phone number" id="phone" required>
                    <label style="color : red;">*Please enter valid phone number</label>
                    <input type="submit" name="submit" value="Submit" id="forgot_but">&nbsp;&nbsp;&nbsp;<a href="user_welcome.php">Cancel</a>
                </form>
            </div>
        </div>
    </body>
</html>
