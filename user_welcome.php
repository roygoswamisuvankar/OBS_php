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
        <title>Quick Cash</title>
        <link href="css/style2.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="script/script2.js" type="text/javascript"></script>
        <link href="css/sidenav.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        // put your code here
        include_once 'dbconfig.php';
        include_once 'usersession.php';
        ?>
        
        <div>
            <div class="container">
                
                <div>
                    <div class="sidenav">
                        <img src="pics/icoon.png" alt="" id="icon"/>
                        <a href="#">Hi!,<?php echo $fname ?></a>
                        <a href="#"><div class="line"></div></a>
                        <a href="#about" id="my_details">View My Details</a>
                        <a href="#services" id="wallet">Wallet</a>
                        <a href="#clients" id="cards">Cards</a>
                        <a href="#makepay" id="makepay">Make Payment</a>
                        <a href="#transaction" id="transaction">Transaction History</a>
                        <a href="#History" id="history">Login History</a>
                        
                     </div>
                </div>
            </div>
            <div>
                <div class="content">
                    <div>
                            <div class="headbar">
                                <span class="head">Quick Cash</span>
                                <span class="logoutbutton"><a href="user_logout.php">Logout</a></span>
                            </div>
                    </div>
                    <div>
                        <div class="mydetails">
                            <h2>My Details</h2>
                            <div>
                                <div class="details">
                                    <?php
                                        $mydetail = mysqli_query($connect, "select *from user2 where phone = $login_session");
                                        while($res = mysqli_fetch_array($mydetail)){
                                    ?>
                                    <table id="my_details">
                                        <thead></thead>
                                        <tbody>
                                            <tr>
                                                <td><label>Name</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['fname']; ?> &nbsp;<?php echo $res['lname']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><label>Email</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><label>Contact Number</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['phone'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><label>Date of Birth</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['dob'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><label>Gender</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['gender'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><label>Document Submit</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['document'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><label>Document Number</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['card_no'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php
                                       }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="wallet">
                            <h1>My Wallet</h1>
                        </div>
                    </div>
                    <div>
                        <div class="cards">
                            <h1>Cards</h1>
                        </div>
                    </div>
                    <div>
                        <div class="makepay">
                            <h1>Make Pay</h1>
                        </div>
                    </div>
                    <div>
                        <div class="transaction">
                            <h1>History transactions</h1>
                        </div>
                    </div>
                    <div>
                        <div class="loginhistory">
                            
                            <?php
                            
                            $history = mysqli_query($connect, "select *from user_login_history where phone = $login_session order by datetime desc");
                                                           
                            ?>
                            <table id="customers">
                                <thead>
                                <th>Your Login Date & Time record</th>
                                </thead>
                                <tbody>
                                    <?php
                                      while($res = mysqli_fetch_array($history, MYSQLI_ASSOC)){
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
        </div>
    </body>
</html>
