<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>
        <link href="../css/sidenav.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/edit.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../script/script2.js" type="text/javascript"></script>
        <script>
            var app = angular.module('myapp', []);
            app.controller('validctrl', function($scope){
                
            });
        </script>
        <style>
            .active{
                font-weight: bold;
            }
            .sidenav a.active{
                color: black;
                font-weight: bold;
                background-color: white;
            }
        </style>
    </head>
    <body>
        <?php
            
            include_once 'dbconfig.php';
            include_once 'session.php';
            
            $now = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
            
            $id = $_GET['id'];
            
            $appr = mysqli_query($connect, "Select *from user where id = $id");
            
            while($res=mysqli_fetch_array($appr)){
                $fname = $res['fname'];
                $lname = $res['lname'];
                $email = $res['email'];
                $phone = $res['phone'];
                $dob = $res['dob'];
                $gender = $res['gender'];
                $document = $res['document'];
                $card_no = $res['card_no'];
                
            }
            
        ?>
        <div>
            <div class="container">
                
                <div>
                    <div class="sidenav">
                        <img src="../pics/icoon.png" alt="" id="icon"/>
                        <a href="#">Admin Operation</a>
                        <a href="#"><?php echo $login_session1 ?></a>
                        <a href="#"><div class="line"></div></a>
                        <a href="admin_welcome.php">Cancel</a>                        
                     </div>
                </div>
            </div>
            <div>
                <div class="content">
                    <div>
                        <div class="headbar">
                            <span class="head">Quick Cash Admin Panel</span>
                            <span class="logoutbutton"><a href="logout.php">Logout</a></span>
                        </div>
                    </div>
                    <div>
                        <div class="approve_body">
                            <h3>Approved this customer's , please provide password to this user and mail the details to him/her</h3>
                            
                            <form name="myform" action="savedata.php" method="post">
                                <input type="text" name="id" value="<?php echo $id ?>" readonly /><br/><br/>
                                <input type="text" name="fname" value="<?php echo $fname ?>" readonly />&nbsp;&nbsp;
                                <input type="text" name="lname" value="<?php echo $lname ?>" readonly /><br/><br/>
                                <input type="email" name="email" value="<?php echo $email ?>" readonly />&nbsp;&nbsp;
                                <input type="text" name="phone" value="<?php echo $phone ?>" readonly /><br/><br/>
                                <input type="date" name="dob" value="<?php echo $dob ?>" readonly />&nbsp;&nbsp;
                                <input type="text" name="gender" value="<?php echo $gender ?>" readonly /><br/><br/>
                                <input type="text" name="document" value="<?php echo $document ?>" readonly />&nbsp;&nbsp;
                                <input type="text" name="card_no" value="<?php echo $card_no ?>" readonly /><br/><br/>
                                <input type="password" name="pass" placeholder="Please provide user's password " required />&nbsp;&nbsp;
                                <input type="text" name="byname" value="<?php echo $login_session1 ?>" readonly /><br/>
                                <input type="text" name="datetime" value="<?php echo $now->format('d-m-Y H:i:s a'); ?>" readonly /><br/><br/>
                                <input type="submit" name="save" value="Approved" />
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

