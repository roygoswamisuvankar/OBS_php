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
    </head>
    <body>
        <?php
        // put your code here
        
        include_once 'dbconfig.php';
        if(isset($_POST['update'])){
            $phone3 = $_POST['phone3'];
            $pass = $_POST['password'];
            $con_pass = $_POST['con_pass'];
            
            if($pass == $con_pass){
                
                $enpass = md5($pass);
                $update_pass = mysqli_query($connect, "update user2 set password = '$enpass' where phone = $phone3");
                
                echo '<script>swal({
                                      title: "Success!",
                                      text: "Password update successfully",
                                      icon: "success"
                                    }).then(function() {
                                            window.location = "login.php";
                                    });</script>';
            }else{
                echo '<script>swal({
                                      title: "Error!",
                                      text: "Confirm password does not matched!",
                                      icon: "error"
                                    }).then(function() {
                                            window.location = "forgot.php";
                                    });</script>';
            }
            
        }
        ?>
    </body>
</html>
