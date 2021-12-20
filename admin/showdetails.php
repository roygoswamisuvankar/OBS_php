
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
        <title>Show Details</title>
        <link href="../css/style2.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="../script/addbalance.js" type="text/javascript"></script>
        <link href="../css/sidenav.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/style3.css" rel="stylesheet" type="text/css"/>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
         
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #f3f3f3;
              }

              li {
                float: left;
              }

              li a {
                display: block;
                color: black;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
              }

              li a:hover {
                background-color: #008cba;
                color: white;
              }
              #details{
                  padding: 12px 18px;
                  border-collapse: collapse;
              }
              #details th, td{
                  text-align: center;
                  padding: 12px 18px;
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
                        <h3 style=" padding: 6px 16px; color: white"><i class='fas fa-user-alt'></i> <?php echo $login_session1 ?></h3>
                        
                        <a href="#"><div class="line"></div></a>                     
                        <a href="admin_welcome.php">Back</a>
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
                      <h3 style="color: green;">Customer Details</h3>
                      <?php
                        $id = $_GET['id'];
                        $result_details = mysqli_query($connect, "select *from user where id = $id");
                       
                        
                        while($res3 = mysqli_fetch_array($result_details)){
                            $id1 = $res3['id'];
                            $fname = $res3['fname'];
                            $lname = $res3['lname'];
                            $email = $res3['email'];
                            $phone = $res3['phone'];
                            $dob = $res3['dob'];
                            $document = $res3['document'];
                            $card_no = $res3['card_no'];
                        }
                        
                        $resultw = mysqli_query($connect, "select *from wallet where phone = $phone");
                        while ($resultw1 = mysqli_fetch_array($resultw)){
                            $balance = $resultw1['balance'];
                        }
                      ?>
                      <label>ID : </label>&nbsp;&nbsp;<?php echo $id1; ?><br/><br/>
                      <label>Name : </label>&nbsp;&nbsp;<?php echo $fname; ?>&nbsp;&nbsp;<?php echo $lname; ?><br/><br/>
                      <label>Email : </label>&nbsp;&nbsp;<?php echo $email; ?><br/><br/>
                      <label>Phone Number : </label>&nbsp;&nbsp;<?php echo $phone; ?><br/><br/>
                      <label>Date of Birth : </label>&nbsp;&nbsp;<?php echo $dob; ?><br/><br/>
                      <label>Authorize Document Type : </label>&nbsp;&nbsp;<?php echo $document; ?><br/><br/>
                      <label>Document Number : </label>&nbsp;&nbsp;<?php echo $card_no; ?><br/><br/>
                      <label>Wallet Balance : </label>&nbsp;&nbsp;Rs.<?php echo $balance; ?>/-<br><br>
                  </div>
                  <div>
                      <script>
                          
                          $(document).ready(function(){
                              $(".debit").hide();
                              $(".credit").hide();
                              $(".account").hide();
                              $(".bankdetail").hide();
                              $(".history").hide();
                              
                              $("#debit").click(function(){
                                    $(".debit").show();                                   
                                    $(".credit").hide();
                                    $(".account").hide();
                                    $(".bankdetail").hide();
                                    $(".history").hide();
                              });
                              
                              $("#credit").click(function(){
                                    $(".debit").hide();
                                    $(".credit").show();                                    
                                    $(".account").hide();
                                    $(".bankdetail").hide();
                                    $(".history").hide();
                              });
                              
                              $("#account").click(function(){
                                    $(".debit").hide();
                                    $(".credit").hide();                                    
                                    $(".account").show();
                                    $(".bankdetail").hide();
                                    $(".history").hide();
                              });
                              
                              $("#bankdetail").click(function(){
                                    $(".debit").hide();
                                    $(".credit").hide();                                    
                                    $(".account").hide();
                                    $(".bankdetail").show();
                                    $(".history").hide();
                              });
                              
                              $("#history").click(function(){
                                    $(".debit").hide();
                                    $(".credit").hide();                                    
                                    $(".account").hide();
                                    $(".bankdetail").hide();
                                    $(".history").show();
                              });
                          });
                      </script>
                      <div>
                          <ul>
                              <li><a href="#Show_Debit" id="debit">Show Debit cards</a></li>
                              <li><a href="#show_credit" id="credit">Show Credit Cards</a></li>
                              <li><a href="#show_transaction" id="account">Account Statements</a></li>
                              <li><a href="#bankdetails" id="bankdetail">Bank Details</a></li>
                              <li><a href="#loginhistory" id="history">Login History</a></li>
                          </ul>
                      </div>
                      <div>
                          <div class="debit">
                              <h4>Customer's Debit card</h4>
                              <?php
                                $result_details = mysqli_query($connect, "select *from debit where phone = $phone");
                        
                        
                       
                              ?>
                              <table border='1' id="details">
                                  <thead>
                                      <tr>
                                          <th>Card Number</th>
                                          <th>Bank</th>
                                          <th>Card Holder Name</th>
                                          <th>Expire Date</th>
                                          <th>CVV Number</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      while($res3 = mysqli_fetch_array($result_details)){
                                            
                                            echo "<tr>";
                                            echo "<td>".$res3['cardno']."</td>";
                                            echo "<td>".$res3['holder']."</td>";
                                            echo "<td>".$res3['bankname']."</td>";
                                            echo "<td>".$res3['expire']."</td>";
                                            echo "<td>xxx</td>";
                                            echo "</tr>";
                                        }
                                      ?>
                                  </tbody>
                              </table>
                              
                          </div>
                          <div class="credit">
                              <h4>Customer's Credit card</h4>
                              <?php
                                $result_details = mysqli_query($connect, "select *from credit where phone = $phone");
                        
                        
                       
                              ?>
                              <table border='1' id="details">
                                  <thead>
                                      <tr>
                                          <th>Card Number</th>
                                          <th>Bank</th>
                                          <th>Card Holder Name</th>
                                          <th>Expire Date</th>
                                          <th>CVV Number</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      while($res3 = mysqli_fetch_array($result_details)){
                                            echo "<tr>";
                                            echo "<td>".$res3['cardno']."</td>";
                                            echo "<td>".$res3['holder']."</td>";
                                            echo "<td>".$res3['bankname']."</td>";
                                            echo "<td>".$res3['expire']."</td>";
                                            echo "</tr>";
                                        }
                                      ?>
                                  </tbody>
                              </table>
                          </div>
                          <div class="account">
                              <h4>Customer's Account's statements</h4>
                              <?php
                                $result_details = mysqli_query($connect, "select *from transaction where phone = $phone");
                        
                        
                       
                              ?>
                              <table border='1' id="details">
                                  <thead>
                                      <tr>
                                          <th>Transaction ID</th>
                                          <th>Transaction Method</th>
                                          <th>Transaction Number</th>
                                          <th>Transaction Time</th>
                                          <th>Transaction Status</th>
                                          <th>Transaction Purpose</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      
                                        while($res3 = mysqli_fetch_array($result_details)){
                                            echo "<tr>";
                                            echo "<td>".$res3['tran_id']."</td>";
                                            echo "<td>".$res3['method']."</td>";
                                            echo "<td>".$res3['cardno']."</td>";
                                            echo "<td>".$res3['datetime']."</td>";
                                            echo "<td>".$res3['status']."</td>";
                                            echo "<td>".$res3['purpose']."</td>";
                                            echo "</tr>";
                                        }
                                        
                                      ?>
                                  </tbody>
                              </table>
                          </div>
                          <div class="bankdetail" >
                              <h1>404 Working Progress !</h1>
                          </div>
                          <div class="history">
                              <h4>Customer's Login History</h4>
                              <?php
                                $result_details = mysqli_query($connect, "select *from user_login_history where phone = $phone");
                        
                        
                       
                              ?>
                              <table border='1' id="details">
                                  <thead>
                                      <tr>
                                          <th>Login Time and Date</th>
                                          
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      while($res3 = mysqli_fetch_array($result_details)){
                                            
                                            echo "<tr>";
                                            echo "<td>".$res3['datetime']."</td>";
                                            echo "</tr>";
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
