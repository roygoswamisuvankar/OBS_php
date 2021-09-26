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
        <script>
            var app = angular.module('myapp', []);
            app.controller('validctrl', function($scope){
                
            });
        </script>
    </head>
    <body>
        <?php
            
            include_once 'dbconfig.php';
            include_once 'session.php';
            
            $id = $_GET['id'];
            
            $edit = mysqli_query($connect, "Select *from user where id = $id");
            
            while($res=mysqli_fetch_array($edit)){
                $fname = $res['fname'];
                $lname = $res['lname'];
                $email = $res['email'];
                $phone = $res['phone'];
                $dob = $res['dob'];
                $gender = $res['gender'];
                
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
                        <div class="edit_body">
                            <h3>Edit Applicants data</h3>
                            <form action="edit2.php" method="post" name="myform" ng-app="myapp" ng-controller="validctrl" novalidate >
                                <input type="text" name="id" value="<?php echo $id; ?>" readonly /><br/><br/>
                                
                                <input type="text" name="fname" ng-init="fname = '<?php echo $fname ?>'" ng-model="fname" ng-pattern="/^[a-zA-Z ]*$/" style="text-transform: capitalize" required /><br/>
                                <span style="color: red" ng-show="myform.fname.$dirty && myform.fname.$invalid">
                                    <span ng-show="myform.fname.$error.required">*First Name is required</span>
                                    <span ng-show="myform.fname.$error.pattern" >*Please enter proper name</span>
                                </span><br/>                        
                                
                                <input type="text" name="lname" ng-init="lname = '<?php echo $lname ?>'" ng-model="lname" ng-pattern="/^[a-zA-Z ]*$/" style="text-transform: capitalize" required /><br/>
                                <span style="color: red" ng-show="myform.lname.$dirty && myform.lname.$invalid">
                                    <span ng-show="myform.lname.$error.required">*Last Name is required</span>
                                    <span ng-show="myform.lname.$error.pattern" >*Please enter proper name</span>
                                </span><br/>                                 
                                
                                <input type="email" name="email" ng-init="email = '<?php echo $email ?>'" ng-model="email" required /><br/>
                                <span style="color: red" ng-show="myform.email.$dirty && myform.email.$invalid">
                                    <span ng-show="myform.email.$error.required">*Email is required</span>
                                    <span ng-show="myform.email.$error.email" >*Please enter proper Email</span>
                                </span><br/> 
                                
                                <input type="text" name="phone" ng-init="phone = '<?php echo $phone ?>'" ng-model="phone" ng-pattern="/^\+?\d{10}$/" maxlength="10" required /><br/>
                                <span style="color: red" ng-show="myform.phone.$dirty && myform.phone.$invalid">
                                    <span ng-show="myform.phone.$error.required">*Contact Number is required</span>
                                    <span ng-show="myform.phone.$error.pattern" >*Please enter proper Contact Number</span>
                                </span><br/> 
                                
                                <input type="date" value="<?php echo $dob ?>" name="dob" required /><br/><br/>
                                
                                <input type="text" name="gender" value="<?php echo $gender ?>" maxlength="7" readonly /><br/><br/>
                                
                                <input type="submit" name="update" value="Update" ng-disabled="myform.$invalid" />
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

