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
        <script>
            $(document).ready(function (){
               $("label").hide();
               $("#phone").on("input", function(){
                   var number = "^[0-9]+$";
                   var data = $("#phone").val();
                   if(!data.match(number)){
                       $("label").show();
                       $("#forgot_but").attr("disabled", true);
                   }else if(data.length<10 || data.length>10){
                        $("label").show();
                        $("#forgot_but").attr("disabled", true);
                   }
                   else{
                       $("label").hide();
                       $("#forgot_but").attr("disabled", false);
                   }
               });
            });
        </script>
    </head>
    <body>
        
        <div>
            <div>
                <img src="image/logo.png" alt=""/><h1>Quick Cash Reset your Password!</h1>
            </div>
            <div class="form">
                <form action="forgot2.php" method="post" name="myforgot">
                    <div class="input">
                        <i style='font-size:24px' class='far'>&#xf2bd;</i>
                    <input type="text" name="phone" placeholder="Enter phone number" id="phone" required>
                    </div><br>
                    <label style="color : red;">*Please enter valid phone number</label><br><br>
                    <div>
                    <input type="submit" name="submit" value="Submit" id="forgot_but">
                    &nbsp;&nbsp;&nbsp;
                    If you want to&nbsp;<a href="user_welcome.php">Cancel?</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
