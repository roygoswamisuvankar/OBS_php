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
        <style>
            
        </style>
    </head>
    <body>
        <?php
            include_once 'session.php';
            include_once 'dbconfig.php';
        ?>
        <div>
            <div class="container">
                
                <div>
                    <div class="sidenav">
                        <img src="../pics/icoon.png" alt="" id="icon"/>
                        <a href="#">Welcome</a>
                        <a href="#"><?php echo $login_session1 ?></a>
                        <a href="#"><div class="line"></div></a>
                        <a href="#about" id="newapp">New Applications</a>
                        <a href="#services" id="approved">Approved Applications</a>
                        <a href="#clients" id="customers">Customers List</a>
                        
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
                    <div class="newapp">
                        <h3>New Applicants</h3>
                        <div>
                            <?php 
                                $newapp = mysqli_query($connect, "select *from user order by id desc");
                            ?>
                            <table border="1">
                                <thead>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Date Of Birth</th>
                                <th>Gender</th>
                                <th>Document Type</th>
                                <th>Document Id</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                <th>Approve</th>
                                </thead>
                                <tbody>
                                   <?php
                                        while($res = mysqli_fetch_array($newapp)){
                                            echo '<tr>';
                                            echo '<td>'.$res['id'].'</td>';
                                            echo '<td>'.$res['fname'].'</td>';
                                            echo '<td>'.$res['lname'].'</td>';
                                            echo '<td>'.$res['email'].'</td>';
                                            echo '<td>'.$res['phone'].'</td>';
                                            echo '<td>'.$res['dob'].'</td>';
                                            echo '<td>'.$res['gender'].'</td>';
                                            echo '<td>'.$res['card_no'].'</td>';
                                            echo '<td>'.$res['datetime'].'</td>';
                                            echo '<tr>';
                                        }
                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
