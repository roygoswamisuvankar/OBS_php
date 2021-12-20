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
        <link href="css/debitcard.css" rel="stylesheet" type="text/css"/>
        <script src="script/debit_credit_show.js" type="text/javascript"></script>
        <link href="css/style2.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="script/script2.js" type="text/javascript"></script>
        <link href="css/sidenav.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/style3.css" rel="stylesheet" type="text/css"/>
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
                        <h3 style=" padding: 6px 16px; color: white"><i class='fas fa-user-alt'></i> Hi!, <?php echo $fname ?></h3>
                        <a href="#"><div class="line"></div></a>
                        <a href="#about" id="my_details"><i class='fas fa-portrait'></i> View My Details</a>
                        <a href="#services" id="wallet"><i class='fas fa-wallet'></i> Wallet</a>
                        <a href="#clients" id="cards"><i class='fas fa-id-card'></i> Cards</a>
                        <a href="#makepay" id="makepay"><i class='fas fa-bank'></i> Make Payment</a>
                        <a href="#transaction" id="transaction"><i class='fa fa-calendar-check-o'></i> Transaction History</a>
                        <a href="#History" id="history"><i class='fas fa-bullseye'></i> Login History</a>
                        
                     </div>
                </div>
            </div>
            <div>
                <div class="content">
                    <div>
                            <div class="headbar">
                                <span class="head">Quick Cash</span>
                                <span class="logoutbutton"><a href="user_logout.php"><i class='fas fa-power-off'></i> Logout</a></span>
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
                                                <td><label><i class='fas fa-user'></i> Name</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['fname']; ?> &nbsp;<?php echo $res['lname']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><label><i class="fa fa-envelope"></i> Email</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><label><i class="fa fa-phone"></i> Contact Number</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['phone'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><label><i class="fa fa-birthday-cake"></i> Date of Birth</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['dob'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><label><i class="fa fa-intersex"></i> Gender</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['gender'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><label><i class="fa fa-file"></i> Document Submit</label></td>
                                                <td> : </td>
                                                <td><?php echo $res['document'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><label><i class="fa fa-file-text"></i> Document Number</label></td>
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
                            <?php 
                                $result = mysqli_query($connect, "select *from wallet where phone = $login_session");
                                
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $count = mysqli_num_rows($result);
                                
                                if($count == 1){
                                    $balance_check = mysqli_query($connect, "select *from wallet where phone = $login_session");
                                    while($res = mysqli_fetch_array($balance_check)){
                                        echo '<h4>Your Current Wallet Balance is : <i class="fa fa-rupee"></i> <font color="blue"> '.$res['balance'].'</font></h4>';
                                        echo '<form action="addbal.php" name="add" method="post">';                 
                                        echo '<input type="number" id="bal" name="bal" min="10" placeholder="Enter Ammount" required />&nbsp;&nbsp;';
                                        echo '<input type="submit" id="submit" name="submit" value="Add Balance" />';
                                        echo '</br></br><font color="red">*Please enter the ammount above Rs.10/-</font>';
                                        echo '</form>';
                                    }                           
                              
                                    
                                }else{
                                    echo '<h4 style=" color : red;">Your Wallet is not activate</h4>';
                                    echo 'To activate click on .... <a href="activate.php">Activate</a>';
                                }
                            ?>
                            <br/>
                            <div>
                                <div class="statement">
                                    <script>
                                    $(document).ready(function (){
                                       $(".show").hide();
                                       $("#show").click(function(){
                                           $(".show").toggle();
                                       })
                                       
                                    });
                                    </script>
                                    <style>
                                        #wallet_trans_his{
                                            
                                            border-collapse: collapse;
                                            padding: 12px 16px;
                                        }
                                        #wallet_trans_his th{
                                            font-weight: bold;
                                            background: #008cba;
                                            color: white;
                                            text-align: center;
                                            padding: 12px 16px;
                                        }
                                        #wallet_trans_his td{
                                            padding: 12px 16px;
                                        }
                                        
                                    </style>
                                    <button id="show" style="padding : 12px 16px; color: white; font-weight: bold; background-color: #008cba; cursor: pointer; border: none;">Show/Hide Balance Statement</button>
                                    <div class="show">
                                        <center><h3>Wallet Balance Statement</h3></center>
                                        <table id="wallet_trans_his">
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>Transaction Time</th>
                                                <th>Amount Debit/Credit</th>
                                                <th>Transaction Amount</th>
                                            </tr>
                                            <?php
                                        $wallet_his = mysqli_query($connect, "select *from wallet_statement where phone = $login_session order by datetime desc");
                                        if(mysqli_num_rows($wallet_his)){
                                            while($wallet_his1 = mysqli_fetch_array($wallet_his)){                                           
                                               
                                                
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<td>'.$wallet_his1['tran_id'].'</td>';
                                                echo '<td>'.$wallet_his1['datetime'].'</td>';
                                                echo '<td>'.$wallet_his1['purpose'].'</td>';
                                                if($wallet_his1['purpose'] == 'Debit'){
                                                    echo '<td style="color : red">Rs. -'.$wallet_his1['amount'].'/-</td>';
                                                }else{
                                                    echo '<td style="color : green">Rs. +'.$wallet_his1['amount'].'/-</td>';
                                                }
                                                echo '</tr>';
                                                
                                            }
                                        }else{
                                            echo '<h3>*No Wallet statement Found</h3>';
                                        }
                                        
                                        ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="cards">
                            <script>
                                $(document).ready(function(){
                                        $(".dcard").show();
                                        $(".c_card").hide();
                                        
                                        $("#debit_card").click(function(){
                                            $(".dcard").show();
                                            $(".c_card").hide();
                                        });
                                        
                                        $("#credit_card").click(function(){
                                           $(".c_card").show();
                                           $(".dcard").hide();
                                        });
                                });
                            </script>
                            <div>
                                <div class="options">
                                    <center>
                                        <a href="#debit" id="debit_card">Show Debit Card</a>&nbsp;&nbsp;
                                        <a href="#credit" id="credit_card">Show Credit Card</a>
                                    </center>
                                </div>
                            </div>
                            <div>
                                <div class="dcard">
                                    <script>
                                        $(document).ready(function(){
                                           $(".show_debitcard").show();
                                           $(".new_debitcard").hide();
                                           
                                           $("#show_debit").click(function(){
                                              $(".show_debitcard").show();
                                              $(".new_debitcard").hide();
                                           });
                                           
                                           $("#new_debit").click(function(){
                                              $(".show_debitcard").hide();
                                              $(".new_debitcard").show();
                                           });
                                        });
                                    </script>
                                    <center>
                                        <h3>Your Debit cards</h3>
                                    </center>
                                    <div>
                                        <div class="options">
                                            <a href="#show_debit" id="show_debit">Show Cards</a>
                                            <a href="#new_debit" id="new_debit">Add New Cards</a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="new_debitcard">
                                            <h3>Add New Debit Card</h3>
                                            <div>
                                                <div class="design_debit">
                                                    <script>
                                                        /*validation of card no input field*/
                                                        $(document).ready(function(){
                                                            
                                                            $("#cardno").hide();
                                                            $("#cardno1").hide();
                                                            
                                                            
                                                            $("#in_cardno").on("input", function(){
                                                               var number = "^[0-9]+$";
                                                                                                                              
                                                               var data = $("#in_cardno").val();
                                                               if(data.length<16){
                                                                   $("#cardno1").show();
                                                                   $("#cardno").hide();
                                                                   $("#save").attr("disabled", true);
                                                               }
                                                               else if(!data.match(number)){
                                                                   $("#cardno").show();
                                                                   $("#cardno1").hide();
                                                                   $("#save").attr("disabled", true);
                                                               }
                                                               
                                                               else{
                                                                   $("#cardno").hide();
                                                                   $("#cardno1").hide();
                                                                   
                                                                   $("#save").attr("disabled", false);
                                                               }
                                                            });
                                                        });
                                                        
                                                        /*holder name*/
                                                        $(document).ready(function(){
                                                           $("#name1").hide();
                                                           var name = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
                                                           $("#holder").on("input", function(){
                                                              var holdername = $("#holder").val();
                                                              if(!holdername.match(name) || holdername.length<=4){
                                                                  $("#name1").show();
                                                                  $("#save").attr("disabled", true);
                                                              }
                                                              else
                                                              {
                                                                  $("#name1").hide();
                                                                  $("#save").attr("disabled", false);
                                                              }
                                                           });
                                                        });
                                                        
                                                        /*cvv number validation*/
                                                        
                                                        $(document).ready(function(){
                                                            $("#cvv").hide();
                                                            var validcvv = "^[0-9]+$";
                                                            
                                                            $("#in_cvv").on("input", function(){
                                                               var data1 = $("#in_cvv").val();
                                                               if(!data1.match(validcvv) || data1.length < 3 || data1.length > 3){
                                                                   $("#cvv").show();
                                                                   $("#save").attr("disabled", true);
                                                               }
                                                               else
                                                               {
                                                                   $("#cvv").hide();
                                                                   $("#save").attr("disabled", false);
                                                               }
                                                            });
                                                        });
                                                        
                                                        
                                                    </script>
                                                    
                                                    <form action="adddebit.php" method="post" name="myform">
                                                        <i class='fas fa-bank' style="font-size: 24px;"></i>
                                                        <select id="" name="bank">
                                                            <option value="Allabahad Bank">Allabahad Bank</option>
                                                            <option value="SBI Bank">SBI Bank</option>
                                                            <option value="SBI Bank">Canara Bank</option>
                                                            <option value="SBI Bank">Baroda Bank</option>
                                                            <option value="SBI Bank">Axis Bank</option>
                                                            <option value="SBI Bank">Indian Bank</option>
                                                            <option value="SBI Bank">Bandhan Bank</option>
                                                        </select>
                                                        
                                                        <label class="l_debit"><i class='fas fa-credit-card'></i> Debit Card</label><br><br>
                                                        <div class="line1"></div><br>
                                                        
                                                        <input type="hidden" value="<?php echo $login_session; ?>" name="phone" />
                                                        
                                                        <i class='fas fa-sim-card' style="font-size: 20px;"></i>&nbsp; <input type="text" maxlength="16" placeholder="xxxx-xxxx-xxxx-xxxx" name="cardno" id="in_cardno" required /><br>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="cardno" style="color: red;" >*Please enter valid card number</label><labe id="cardno1" style="color: red;" >*Card number must be 16 digits number</labe><br/>
                                                        
                                                        <i class='fas fa-user-alt' style="font-size: 20px;"></i> <input type="text" name="holder" id="holder" placeholder="Card Holder Name" required /><br/>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="name1" style="color: red;" >*Please enter valid name</label><br/>
                                                        
                                                        <label class="cvv">CVV </label> <input type="number" name="cvv" placeholder="123" maxlength="3" id="in_cvv" required/> &nbsp; &nbsp; <label class="expire">Expire Date </label><input type="date" name="date" placeholder="DD/MM/YYYY" id="in_date" required /><br/>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="cvv" style="color: red;" >*Please enter valid CVV</label>                                                   
                                                        
                                                        <label id="date"></label><br/>
                                                        &nbsp;&nbsp;<i class="fa fa-lock" style="font-size:24px"></i>&nbsp;&nbsp;<input type="password" name="pin" placeholder="Set PIN" id="pin" required /><br/><br/> 
                                                        <style>
                                                            #pin{
                                                                padding: 8px 10px;
                                                                font-size: 15px;
                                                                border-radius: 5px;
                                                                border: 0.5px solid black;
                                                                width: 20%;
                                                                
                                                            }
                                                        </style>
                                                        <input type="submit" name="save" value="Save" id="save" /> 
                                                        <span style=" float: right; padding: 10px 12px;">
                                                            &nbsp;&nbsp;<i class="fa fa-cc-discover" style=" font-size: 30px;"></i>
                                                            &nbsp;&nbsp;<i class="fa fa-cc-visa" style=" font-size: 30px;"></i>
                                                            &nbsp;&nbsp;<i class="fa fa-cc-mastercard" style=" font-size: 30px;"></i>
                                                            &nbsp;&nbsp;<i class="fa fa-google-wallet" style=" font-size: 30px;"></i>
                                                            &nbsp;&nbsp;<i class="fa fa-paypal" style=" font-size: 30px;"></i>
                                                        </span>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="show_debitcard">
                                            <h3>Your Debit Card</h3>
                                            <div>
                                                
                                                <!--<div class="design_debit">-->
                                                <?php
                                                    $show_debit_card = mysqli_query($connect, "select *from debit where phone = $login_session");
                                            
                                                    while($show_debit = mysqli_fetch_array($show_debit_card)){
                                                        
                                                        echo '<p>';
                                                        echo '<div>';
                                                        echo '<div class="design_debit">';
                                                        echo '<input type="hidden" value="'.$show_debit['id'].'"/>';
                                                        echo '<i class="fas fa-bank" style="font-size: 24px;"></i> <input type="text" value="'.$show_debit['bankname'].'" readonly style="width : 30%;" />';
                                                        echo '<label class="l_debit"><i class="fas fa-credit-card"></i> Debit Card</label><br><br>';
                                                        echo '<div class="line1"></div><br>';
                                                        echo '<i class="fas fa-sim-card" style="font-size: 20px;"></i>&nbsp; <input type="text" value="'.$show_debit['cardno'].'" readonly /></br></br>';
                                                        echo '<i class="fas fa-user-alt" style="font-size: 20px;"></i> <input type="text" value="'.$show_debit['holder'].'" readonly /></br></br>';
                                                        echo '<label class="cvv">CVV</label>&nbsp&nbsp<input type="text" value="'.$show_debit['cvv'].'" readonly style="width: 20%;" />';
                                                        echo '&nbsp &nbsp <lable class="expire">Expire Date</label>&nbsp<input type="text" value="'.$show_debit['expire'].'" readonly style="width: 30%;"/><br/><br/>';
                                                        echo "<a href=\"delete_debit.php?id=$show_debit[id]\" onClick=\"return confirm('Are you Sure?')\" style='padding: 12px 15px; color: white; background-color: red; border-radius: 5px; cursor: pointer; text-decoration: none; position: absolute; top: 80%;' ><i class='fa fa-remove'></i> Delete</a>";
                                                        echo '<span style=" float: right; padding: 10px 12px;">
                                                            &nbsp;&nbsp;<i class="fa fa-cc-discover" style=" font-size: 30px;"></i>
                                                            &nbsp;&nbsp;<i class="fa fa-cc-visa" style=" font-size: 30px;"></i>
                                                            &nbsp;&nbsp;<i class="fa fa-cc-mastercard" style=" font-size: 30px;"></i>
                                                            &nbsp;&nbsp;<i class="fa fa-google-wallet" style=" font-size: 30px;"></i>
                                                            &nbsp;&nbsp;<i class="fa fa-paypal" style=" font-size: 30px;"></i>
                                                        </span>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                        echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
                                                        echo '<p>';
                                                    }
                                                ?>
                                                
                                                <!--</div>-->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="c_card">
                                    <h1>404 Working in Progress!</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="makepay">
                            <div>
                                <script>
                                    $(document).ready(function(){
                                        
                                        $(".bank").hide();
                                        $(".mobile").hide();
                                        
                                       $("#bank").click(function(){
                                           $(".bank").show();
                                           $(".mobile").hide();
                                       });
                                       
                                       $("#mobile").click(function(){
                                           $(".bank").hide();
                                           $(".mobile").show();
                                       })
                                    });
                                </script>
                                <h1>Make Your Pay</h1>
                                <input type="radio" name="paymode" id="bank"><label>Pay To Bank</label>
                                <input type="radio" name="paymode" id="mobile"><label>Mobile Recharge</label>
                                <div class="bank">
                                    <div>
                                        <script>
                                            $(document).ready(function(){
                                               $(".debit").hide();
                                               $(".credit").hide();
                                               $(".wallet2").hide();
                                               
                                               $("#debit").click(function(){
                                                    $(".debit").show();
                                                    $(".credit").hide();
                                                    $(".wallet2").hide();
                                               });
                                               
                                               $("#credit").click(function(){
                                                    $(".debit").hide();
                                                    $(".credit").show();
                                                    $(".wallet2").hide();
                                               });
                                               
                                               $("#wallet2").click(function(){
                                                    $(".debit").hide();
                                                    $(".credit").hide();
                                                    $(".wallet2").show();
                                               });
                                            });
                                        </script>
                                        <h2>Chose your payment options</h2>
                                        <input type="radio" name="pay_to" id="debit"><label>Use Debit Card</label>
                                        <input type="radio" name="pay_to" id="credit"><label>Use Credit Card</label>
                                        <input type="radio" name="pay_to" id="wallet2"><label>Use Wallet</label>
                                        <div class="debit">
                                            <h4 style="color: #00802b;">Using Your Debit Card</h4>
                                            <?php
                                            $show_debit2 = mysqli_query($connect, "select *from debit where phone = $login_session");
                                            $row2 = mysqli_fetch_array($show_debit2, MYSQLI_ASSOC);
                                            $count2 = mysqli_num_rows($show_debit2);
                                            
                                            if($count2>=1){
                                                $show_debit3 = mysqli_query($connect, "select *from debit where phone = $login_session");
                                                $pay1 = mysqli_query($connect, "select *from debit where phone = $login_session");
                                                while($res2 = mysqli_fetch_array($pay1)){
                                                    $pay_form2 = true;
                                                }
                                            }else{
                                                echo '<h4 style="color: red"> *Debit Card Not Found</h4>';
                                            }
                                            
                                            /*fetch details of debit card*/
                                            if($pay_form2 == true){
                                                $find_debit2 = mysqli_query($connect, "select *from debit where phone = $login_session");
                                                while($find2 = mysqli_fetch_array($find_debit2)){
                                                    echo '<form action="#" name="my_pay_form" method="post">';
                                                    echo '<input type="text" placeholder="Enter Account Number" name="acno" style="padding : 8px 10px; border-radius: 5px; width: 15%;" required >&nbsp;&nbsp;';
                                                    echo '<input type="text" placeholder="Enter Amount" name="amt" style="padding : 8px 10px; border-radius: 5px; width: 10%;" required ><br/><br/>';
                                                    echo '<i class="fa fa-credit-card" style="font-size:24px"></i>';                                                
                                                    echo "<input type='hidden' value=".$find2['id']." name = 'id' />";
                                                    echo "<input type='hidden' value=".$find2['bankname']." name = 'bankname'/>";
                                                    echo "<input type='hidden' value=".$find2['cardno']." name = 'cardno'/>";
                                                    echo "<input type='hidden' value=".$cur." name = 'balance'/>";
                                                    echo "&nbsp;&nbsp;".$find2['bankname']."&nbsp;&nbsp;";
                                                    echo "A/C ".$find2['cardno']."&nbsp;&nbsp;";
                                                    echo '<input type="text" name="cvv" placeholder="CVV" required style="padding : 8px 10px; border-radius: 5px; width: 5%;" />&nbsp;&nbsp;';
                                                    echo '<input type="password" name="pin" placeholder="Pin" required style="padding : 8px 10px; border-radius: 5px; width: 5%;" />&nbsp;&nbsp;';
                                                    echo "<input type='submit' value='Pay' name = 'pay' style='padding: 8px 10px; border: none; border-radius: 5px; color: white; font-weight: bold; background-color: green; cursor: pointer;' />";
                                                    echo '</form>';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="credit">
                                            <h4 style="color: #00802b;">Using Your Credit</h4>
                                            <?php
                                            $show_debit2 = mysqli_query($connect, "select *from credit where phone = $login_session");
                                            $row2 = mysqli_fetch_array($show_debit2, MYSQLI_ASSOC);
                                            $count2 = mysqli_num_rows($show_debit2);
                                            
                                            if($count2>=1){
                                                $show_debit3 = mysqli_query($connect, "select *from credit where phone = $login_session");
                                                $pay1 = mysqli_query($connect, "select *from credit where phone = $login_session");
                                                while($res2 = mysqli_fetch_array($pay1)){
                                                    $pay_form2 = true;
                                                }
                                            }else{
                                                echo '<h4 style="color: red">*Credit Card not Found</h4>';
                                            }
                                            
                                            /*fetch details of debit card*/
                                            if($pay_form2 == true){
                                                $find_debit2 = mysqli_query($connect, "select *from credit where phone = $login_session");
                                                while($find2 = mysqli_fetch_array($find_debit2)){
                                                    echo $find2['bankname'];
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="wallet2">
                                            <h4 style="color: #00802b;">Wallet</h4>
                                            <?php 
                                $result = mysqli_query($connect, "select *from wallet where phone = $login_session");
                                
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $count = mysqli_num_rows($result);
                                
                                if($count == 1){
                                    $balance_check = mysqli_query($connect, "select *from wallet where phone = $login_session");
                                    while($res = mysqli_fetch_array($balance_check)){
                                        echo '<h4>Your Current Wallet Balance is : <i class="fa fa-rupee"></i> <font color="blue"> '.$res['balance'].'</font></h4>';
                                                    echo '<form action="money_trans.php" name="my_pay_form" method="post">';
                                                    echo '<input type="text" placeholder="Enter phone Number" name="acno" id="number" style="padding : 8px 10px; border-radius: 5px; width: 15%;" required >&nbsp;&nbsp;';
                                                    echo '<input type="text" placeholder="Enter Amount" name="amt" id="amount" style="padding : 8px 10px; border-radius: 5px; width: 10%;" required >&nbsp;&nbsp;';
                                                    echo "<input type='submit' value='Pay' name = 'pay' style='padding: 8px 10px; border: none; border-radius: 5px; color: white; font-weight: bold; background-color: green; cursor: pointer;' /><br/>";
                                                    
                                                    echo '<label style="color : red;" class=""></label>';
                                                    echo '</form>';
                                    }
                                }else{
                                    echo '<h4 style=" color : red;">Your Wallet is not active</h4>';
                                    echo 'To activate click on .... <a href="activate.php">Activate</a>';
                                }
                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile">
                                    <h1>404 Working in progress!</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="transaction">
                            <center><h3>My transactions History</h3></center>
                            <table id="customers">
                                <thead>
                                <th>Transaction ID</th>
                                <th>Pay Method</th>
                                <th>To A/C or Card No.</th>
                                <th>By A/C or Phone No.</th>
                                <th>Date & Time</th>
                                <th>Purpose</th>
                                <th>Amount in Rs</th>
                                <th>Status</th>
                                
                                </thead>
                                <tbody>
                                    
                                        <?php 
                                            $tran_his = mysqli_query($connect,"select *from transaction where phone = $login_session or cardno = $login_session order by datetime desc");
                                
                                            while($tran_res_his = mysqli_fetch_array($tran_his)){
                                                echo '<tr>';
                                                echo "<td>".$tran_res_his['tran_id']."</td>";
                                                echo "<td>".$tran_res_his['method']."</td>";
                                                echo "<td>".$tran_res_his['cardno']."</td>";
                                                echo "<td>".$tran_res_his['phone']."</td>";
                                                echo "<td>".$tran_res_his['datetime']."</td>";
                                                echo "<td>".$tran_res_his['purpose']."</td>";
                                                echo "<td>Rs.".$tran_res_his['amount']."/-</td>";
                                                if($tran_res_his['status'] == 'Success'){
                                                    echo "<td style='color : green'>".$tran_res_his['status']."</td>";
                                                }else{
                                                    echo "<td style='color : red'>".$tran_res_his['status']."</td>";
                                                }
                                                echo '</tr>';
                                            }
                                        ?>
                                
                                </tbody>
                            </table>
                            
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
