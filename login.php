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
        <title>Quick Cash</title>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="script/script.js" type="text/javascript"></script>
        <link href="css/style1.css" rel="stylesheet" type="text/css"/>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script/script2.js" type="text/javascript"></script>
        <script>
            var rootApp = angular.module('rootApp', ['myapp','myapp1']);
            var app = angular.module('myapp',[]);
            app.controller('validctrl',function($scope){
               
            });
            var app1 = angular.module('myapp1',[]);
            app1.controller('validcontrol',function($scope){
                
            });
        </script>
        <style>
            .cancel{
                text-decoration: none;
                padding: 10px 12px;
                color: white;
                background-color: red;
                font-weight: bold;
                border-radius: 5px;
            }
            .in{
                padding: 12px 16px;
                border: 1px solid black;
            }
        </style>
    </head>
    <body ng-app="rootApp">
        <div>
            <div class="container">
                <div>
                    <div class="heading">
                        <h1>Quick Cash</h1>
                    </div>
                </div>
                <div>
                    <div class="navbar">
                        <a class="login" href="#login">Login</a>
                        <a> | </a>
                        <a class="regis" href="#createaccount">Create Account</a>
                    </div>
                </div>
                <div>
                    <div class="login_sec">
                        <form action="user_login.php" method="post" name="myform" ng-app="myapp1" ng-controller="validcontrol" novalidate >
                            
                            <div class="in"><i style='font-size:24px' class='far'>&#xf2bd;</i>
                                <input type="text" name="username" placeholder="Enter your Phone Number " ng-model="usename" ng-pattern="/^\+?\d{10}$/" maxlength="10" style="border : none; font-size: 15px;" required/><br/>
                            </div> 
                            <span style="color: red" ng-show="myform.username.$dirty && myform.username.$invalid">
                                <span ng-show="myform.username.$error.required">*Phone Number is required</span>
                                <span ng-show="myform.username.$error.pattern" >*Enter valid Contact Number</span>
                             </span><br/><br/>
                            
                             <div class="in"><i class='fas fa-unlock-alt' style='font-size:24px'></i>
                                 <input type="password" name="pass" placeholder="Enter your password" ng-model="pass" required="" style="border: none; font-size: 15px;" /><br/>
                             </div>
                             <span style="color: red" ng-show="myform.pass.$dirty && myform.pass.$invalid">
                                <span ng-show="myform.pass.$error.required">*Password is required</span>
                            </span><br/><br/>
                                                        
                            <input type="submit" value="Login" name="login" ng-disabled="myform.$invalid" style="font-size: 15px;" /> &nbsp;&nbsp;&nbsp;&nbsp; <a href="index.html" class="cancel" >Cancel</a>
                        </form>
                        <br/><a href="forgot.php">Forgot Password?</a>
                    </div>
                    <div class="regis_sec">
                        <form action="createaccount.php" method="post" ng-app="myapp" ng-controller="validctrl" name="myform" novalidate>
                            <!--First Name input field -->
                            <input type="text" name="fname" placeholder="Ex: John" ng-model="fname" ng-pattern="/^[a-zA-Z ]*$/" style="text-transform: capitalize" required/>
                            <!-- Last Name input field -->
                            <input type="text" name="lname" placeholder="Ex: Smith" ng-model="lname" ng-pattern="/^[a-zA-Z ]*$/" style="text-transform: capitalize" required/>
                            
                            <!-- First Name validation --><br/>
                            <span style="color: red" ng-show="myform.fname.$dirty && myform.fname.$invalid">
                                <span ng-show="myform.fname.$error.required">*First Name is required</span>
                                <span ng-show="myform.fname.$error.pattern" >*Enter valid Name</span>
                            </span>
                            <!-- Last Name validation -->
                            <span style="color: red" ng-show="myform.lname.$dirty && myform.lname.$invalid">
                                <span ng-show="myform.lname.$error.required">*Last Name is required</span>
                                <span ng-show="myform.lname.$error.pattern" >*Enter valid Name</span>
                            </span><br/>
                            
                            <!-- Email address input field -->
                            <input type="email" name="email" placeholder="Ex: someone@gmail.com" ng-model="email" required />
                            <!--phone number input field -->
                            <input type="text" name="phone" placeholder="Ex: 9887223456" ng-model="phone" ng-pattern="/^\+?\d{10}$/" maxlength="10" required />
                            
                            <!-- Email validation --><br/>
                            <span style="color: red" ng-show="myform.email.$dirty && myform.email.$invalid">
                                <span ng-show="myform.email.$error.required">*Email address is required</span>
                                <span ng-show="myform.email.$error.email" >*Enter valid Email Address</span>
                            </span>
                            <!--Phone number validation -->
                            <span style="color: red" ng-show="myform.phone.$dirty && myform.phone.$invalid">
                                <span ng-show="myform.phone.$error.required">*Contact Number is required</span>
                                <span ng-show="myform.phone.$error.pattern" >*Enter valid Contact Number</span>
                            </span><br/>
                            
                            <!-- Date of birth input field -->
                            <input type="date" name="date" ng-model="date" required />
                            <!-- Date of birth validation -->
                            <span style="color: red" ng-show="myform.date.$dirty && myform.date.$invalid">
                                <span ng-show="myform.date.$error.required">*Date of Birth is required</span>
                            </span>
                            
                            <!-- Gender input field -->
                            <input type="radio" name="gender" value="Male" ng-model="gender" required />
                            <label>Male</label>
                            <input type="radio" name="gender" value="Female" ng-model="gender" required />
                            <label>Female</label>
                            <input type="radio" name="gender" value="Other" ng-model="gender" required />
                            <label>Other</label><br/>                            
                            <!-- Gender Validation -->
                            <span style="color: red" ng-show="myform.gender.$dirty && myform.gender.$invalid">
                                <span ng-show="myform.gender.$error.required">*Gender is required</span>
                            </span><br/>
                            
                            <!-- Document type filed -->
                            <select name="document" ng-model="document" id="document" required>
                                <option value="Aadhaar Card">Aadhaar Card</option>
                                <option value="Pan Card">Pan Card</option>
                                <option value="Voter Card">Voter Id</option>
                            </select><br/>
                            <!-- document type validation -->
                            <span style="color: red" ng-show="myform.document.$dirty && myform.document.$invalid">
                                <span ng-show="myform.document.$error.required">*Contact Number is required</span>
                            </span><br/>
                            
                            <!-- Document number field -->
                            <input type="text" name="card_no" ng-model="card_no" placeholder="Ex: 123 456 789" maxlength="12" ng-pattern="/^\+?\d{12}$/" required /><br/>
                            <!-- Document number validation -->
                            <span style="color: red" ng-show="myform.card_no.$dirty && myform.card_no.$invalid">
                                <span ng-show="myform.card_no.$error.required">*Your Id number is required</span>
                                <span ng-show="myform.card_no.$error.pattern" >*Enter valid id number</span>
                            </span><br/>
                            <?php $nowtime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); ?>
                            <input type="hidden" name="datetime" value="<?php echo $nowtime->format('d-m-Y H:i:s a'); ?>" />
                            
                            <input type="submit" value="Submit" name="submit" ng-disabled="myform.$invalid" />&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.html" class="cancel" >Cancel</a>
                        </form>
                        
                    </div>
                </div>
            </div>
            <div>
                <div class="side">
                    <img src="pics/icoon.png" alt="" id="icon" />
                </div>
            </div>
        </div>
    </body>
</html>
