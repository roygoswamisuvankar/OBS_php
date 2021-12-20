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
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link href="../css/sidenav.css" rel="stylesheet" type="text/css"/>
        <script src="../script/script2.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
            $(document).ready(function(){
                $(".approved").hide();
                $(".history").hide();
                $("#newapp").click(function(){
                    $(".newapp").show();
                    $(".approved").hide();
                    $(".history").hide();
                });
                
                $("#approved").click(function(){
                    $(".newapp").hide();
                    $(".history").hide();
                    $(".approved").show();
                });
                
                $("#history").click(function(){
                    $(".history").show();
                    $(".approved").hide();
                    $(".newapp").hide();
                });
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
            include_once 'session.php';
            include_once 'dbconfig.php';
            
                            
        ?>
        <div>
            <div class="container">
                
                <div>
                    <div class="sidenav">
                        <img src="../pics/icoon.png" alt="" id="icon"/>
                        <h3 style=" padding: 12px 16px; color: white;">Welcome
                        <?php echo $login_session1 ?></h3>
                        <a href="#"><div class="line"></div></a>
                        <a href="#about" id="newapp">New Applications</a>
                        <a href="#services" id="approved">Approved Applications</a>
                        <!--<a href="#clients" id="customers">Find Customer</a>-->
                        <a href="#History" id="history">Login History</a>
                        
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
                                
                                $newapp = mysqli_query($connect,"SELECT *from user where id not in (select id from user2) order by datetime desc");
                            ?>
                            <table id="customers">
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
                                <th>Application Date</th>
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
                                                    echo '<td>'.$res['document'].'</td>';
                                                    echo '<td>'.$res['card_no'].'</td>';
                                                    echo '<td>'.$res['datetime'].'</td>';
                                                    echo "<td><a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure?')\"><i class='fa fa-remove' style='color: red'></i></a></td>";
                                                    echo "<td><a href=\"edit.php?id=$res[id]\"><i class='fas fa-edit' style='color: orange'></i></a></td>";
                                                    echo "<td><a href=\"approve.php?id=$res[id]\"><i class='fa fa-check-square-o' style='color: green'></i></a></td>";
                                                    echo '<tr>';
                                            }    
                                    
            
                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="approved">
                        <h3>Approved Applicants</h3>
                        <?php
                            $approvedapp1 = mysqli_query($connect, "select *from user2 order by datetime desc");
                        ?>
                        <table id="customers">
                            <thead>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact Number</th>
                            <th>Approved By</th>
                            <th>Approval Time</th>
                            <th>More</th>
                            </thead>
                            <tbody>
                                <?php
                                    while($res1 = mysqli_fetch_array($approvedapp1)){
                                        echo '<tr>';
                                        echo '<td>'.$res1['id'].'</td>';
                                        echo '<td>'.$res1['fname'].'</td>';
                                        echo '<td>'.$res1['lname'].'</td>';
                                        echo '<td>'.$res1['phone'].'</td>';
                                        echo '<td>'.$res1['byname'].'</td>';
                                        echo '<td>'.$res1['datetime'].'</td>';
                                        echo "<td><a href=\"showdetails.php?id=$res1[id]\">Details</a></td>";
                                        echo '</tr>';
                                        
                                       
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="history">
                        <h3>Admin Login History</h3>
                        <?php
                            $history = mysqli_query($connect,"select datetime from adminlogin where admin_id = $login_session order by datetime desc");
                            
                        ?>
                        
                        <table id="customers">
                            <thead>
                            <th>Date & Time </th>
                            </thead>
                            <tbody>
                                <?php
                                    while($res = mysqli_fetch_array($history)){
                                        echo '<tr>';
                                        echo '<td>'.$res['datetime'].'</td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
