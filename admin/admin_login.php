<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link href="../css/admin.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            var app = angular.module('myapp', []);
            app.controller('validctrl', function($scope){
                
            });
        </script>
    </head>
    <body>
        <?php
        // put your code here
        include_once 'dbconfig.php';
        include_once 'session.php';
        //current date and time
             $now = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
             //echo $now->format('d-m-Y H:i:s a');
             
            session_start();
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = mysqli_real_escape_string($connect,$_POST['id']);
                $password = mysqli_real_escape_string($connect,$_POST['pass']);
                
                $date = $_POST['date'];

                $sql = "select *from admin where admin_id = '$username' and pass = '$password'";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

               // $active = $row['admin_id'];
                $count = mysqli_num_rows($result);

                if($count == 1){
                    $save = mysqli_query($connect, "insert into adminlogin(admin_id, datetime) values('$username','$date')");
                    $_SESSION['login_user'] = $username;
                    header("location: admin_welcome.php");
                }else{
                    echo '<script>swal({
                                      title: "Error!",
                                      text: "User ID or Password is wrong!",
                                      icon: "error"
                                    }).then(function() {
                                            window.location = "admin_login.php";
                                    });</script>';
                }
            }
        ?>
        <div>
            <div>
                <div class="heading">
                    <h1>Quick Cash Admin Panel Login</h1>
                </div>
            </div>
            <div class="container">
                <form action="admin_login.php" method="post" name="myform" ng-app="myapp" ng-controller="validctrl" novalidate >
                    
                    <input type="text" name="id" placeholder="Please enter your ID" autocomplete="off" ng-model="id" required /><br/>
                    <span style="color: red" ng-show="myform.id.$dirty && myform.id.$invalid">
                        <span ng-show="myform.id.$error.required">*Please provide your user ID</span>
                    </span><br/>
                    
                    <input type="password" name="pass" placeholder="Please enter your password" ng-model="pass" required /><br/>
                    <span style="color: red" ng-show="myform.pass.$dirty && myform.pass.$invalid">
                        <span ng-show="myform.pass.$error.required">*Please provide your password</span>
                    </span><br/>
                    
                    <input type="hidden" name="date" value="<?php echo $now->format('d-m-Y H:i:s a'); ?>" />
                    <input type="submit" name="submit" value="Login" ng-disabled="myform.$invalid" />
                </form>
            </div>
            <div>
                <div class="side">
                    <img src="../pics/icoon.png" alt="" id="icon" />
                </div>
            </div>
        </div>
    </body>
</html>
