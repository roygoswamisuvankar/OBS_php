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
        <title>Add Debit Card</title>
        <!--<link href="../css/style2.css" rel="stylesheet" type="text/css"/>-->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="../script/addbalance.js" type="text/javascript"></script>
        <link href="../css/sidenav.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--<link href="../css/style3.css" rel="stylesheet" type="text/css"/>-->
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
            .in{
                padding: 10px 12px;
                border: 1px solid black;
                width: 25%;
            }
            input[type=text]{
                padding: 10px 15px;
                font-size: 15px;
                border: none;
                width: 80%;
            }
            input[type='submit']{
                position: absolute;
                top: 6.2%;
                left: 40%;
                padding: 18px 20px;
                border: none;
                cursor: pointer;
                background-color: brown;
                color: white;
                font-size: 15px;
                font-weight: bold;
                
            }
        </style>
    </head>
    <body>
        <?php
        // put your code here
        include_once 'session.php';
        include_once 'dbconfig.php';
        ?>
        <div>
            <div class="container">
                
                <div>
                    <div class="sidenav">
                        <img src="../pics/icoon.png" alt="" id="icon"/>
                        <h3 style=" padding: 6px 16px; color: white"><i class='fas fa-user-alt'></i> <?php echo $login_session1; ?></h3>
                        
                        <a href="#"><div class="line"></div></a>
                        <a href="admin_welcome.php">Cancel</a>
                     </div>
                </div>
            </div>
        </div>
        <div>
              <div class="content">
                    <div>
                            <div class="headbar">
                                <span class="head">Quick Cash</span>
                                <span class="logoutbutton"><a href="logout.php"><i class='fas fa-power-off'></i> Logout</a></span>
                            </div>
                    </div>
                  <div>
                      <div>
                          
                          <form action="find.php" method="post" name="myform">
                             
                                  <div class="in"><i class="fa fa-search" style="font-size:24px"></i>
                                  <input type="text" name="search" placeholder="Enter Phone Number"/>
                                  </div>
                                  <input type="submit" value="Search" name="find" id="find"/>
                              
                          </form>
                          <center><h3>Customer's Details</h3></center>
                          <div class="find_data">
                              <table border='1'>
                              <thead>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email Address</th>
                              <th>Phone Number</th>
                              <th>Date of Birth</th>
                              <th>Gender</th>
                              <th>Document Type</th>
                              <th>Document Number</th>
                              </thead>
                              <tbody>
                                  <?php
                            if(isset($_POST['find'])){
                                $find_value = $_POST['search'];
                                
                                $find = mysqli_query($connect, "select *from user where phone = $find_value");
                                
                                $wallet = mysqli_query($connect, "select *from wallet where phone = $find_value");
                                
                                $wall_sta = mysqli_query($connect,"select *from wallet_statement where phone = $find_value");
                                
                                $transaction_his = mysqli_query($connect, "select *from transaction where phone = $find_value");
                                
                                while($res = mysqli_fetch_array($find)){
                                    echo '<tr>';
                                    echo '<td>'.$res['fname'].'</td>';
                                    echo '<td>'.$res['lname'].'</td>';
                                    echo '<td>'.$res['email'].'</td>';
                                    echo '<td>'.$res['phone'].'</td>';
                                    echo '<td>'.$res['dob'].'</td>';
                                    echo '<td>'.$res['gender'].'</td>';
                                    echo '<td>'.$res['document'].'</td>';
                                    echo '<td>'.$res['card_no'].'</td>';
                                    echo '</tr>';
                                }
                            }
                          ?>
                              </tbody>
                          </table>
                              <center><h3>Wallet Ballance</h3></center>
                              <table border='1'>
                                  <thead>
                                  <th>Current wallet balance : </th>
                                  <?php
                                  while($wallet1 = mysqli_fetch_array($wallet)){
                                      echo '<td>Rs.'.$wallet1['balance'].'/-</td>';
                                  }
                                  ?>
                                  </thead>
                              </table>
                              <center><h3>Wallet Statement</h3></center>
                              <table border='1'>
                                  <thead>
                                  <th>Transaction ID</th>
                                  <th>Transaction Time</th>
                                  <th>Debit/Credit</th>
                                  <th>Amount in RS.</th>
                                  </thead>
                                  <tbody>
                                      <?php
                                        while($wall_sta1 = mysqli_fetch_array($wall_sta)){
                                            echo '<tr>';
                                            echo '<td>'.$wall_sta1['tran_id'].'</td>';
                                            echo '<td>'.$wall_sta1['datetime'].'</td>';
                                            echo '<td>'.$wall_sta1['purpose'].'</td>';
                                            echo '<td>Rs.'.$wall_sta1['amount'].'/-</td>';
                                            echo '</tr>';
                                        }
                                      ?>
                                  </tbody>
                              </table>
                              <center><h3>Customer's Account Statements</h3></center>
                              <table border='1'>
                                  <thead>
                                  <th>Transaction ID</th>
                                  <th>Transaction Method</th>
                                  <th>To Transaction</th>
                                  <th>Transaction BY</th>
                                  <th>Transaction Time</th>
                                  <th>Transaction Status</th>
                                  <th>Transaction Purpose</th>
                                  <th>Transaction Amount in RS</th>
                                  </thead>
                                  <tbody>
                                      <?php
                                        while($transaction_his1 = mysqli_fetch_array($transaction_his)){
                                            echo '<tr>';
                                            echo '<td>'.$transaction_his1['tran_id'].'</td>';
                                            echo '<td>'.$transaction_his1['method'].'</td>';
                                            echo '<td>'.$transaction_his1['cardno'].'</td>';
                                            echo '<td>'.$transaction_his1['phone'].'</td>';
                                            echo '<td>'.$transaction_his1['datetime'].'</td>';
                                            echo '<td>'.$transaction_his1['status'].'</td>';
                                            echo '<td>'.$transaction_his1['purpose'].'</td>';
                                            echo '<td>Rs.'.$transaction_his1['amount'].'/-</td>';
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
