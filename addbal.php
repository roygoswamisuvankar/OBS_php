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
        <title>Add Balance</title>
        <link href="css/style2.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="script/addbalance.js" type="text/javascript"></script>
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
        
        /*fetch previous balance*/
        $prev = mysqli_query($connect, "select *from wallet where phone = $login_session");
        while($res = mysqli_fetch_array($prev)){
            $previous = $res['balance'];
        }
        
        
        
        ?>
                
        <div>
            <div class="container">
                
                <div>
                    <div class="sidenav">
                        <img src="pics/icoon.png" alt="" id="icon"/>
                        <h3 style=" padding: 6px 16px; color: white"><i class='fas fa-user-alt'></i> <?php echo $fname ?></h3>
                        
                        <a href="#"><div class="line"></div></a>
                        
                        
                        <a href="user_welcome.php">Cancel</a>
                     </div>
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
                        <div class="">
                            <h2>Add Balance </h2>
                            <?php
                            /*calculation and updates*/
                            if(isset($_POST['submit'])){
                                    $cur = $_POST['bal'];
                                    echo 'Current Account balance : <font color="Blue"><b>'.$previous.'</b></font></br>';
                                    echo 'To add Ammount <font color="Blue" ><b>'.$cur.'</b></font> in your wallet choose your payment method';
                            }
                            ?>
                            <h3>Choose your payment methods</h3>
                        </div>
                           <?php
                           $result = mysqli_query($connect, "select *from debit where phone = $login_session");
                                
                           $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                           $count = mysqli_num_rows($result);
                                
                                if($count == 1){
                                    $balance_check = mysqli_query($connect, "select *from debit where phone = $login_session");
                                    while($res = mysqli_fetch_array($balance_check)){
                                        $debit = $res['cardno'];
                                        $bankname = $res['bankname'];
                                        $status = "success";
                                        $sms = "Pay using your Debit Card";
                                        $pay_form = true;
                                    }
                                }else{
                                    $sms = "*You have no Debit Card on your data bases, please add first then try again";
                                    $status = "Failed";
                                    $pay_form = false;
                                }
                                
                           ?>
                        <?php
                        $result = mysqli_query($connect, "select *from credit where phone = $login_session");
                                
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $count = mysqli_num_rows($result);
                                
                                if($count == 1){
                                    $balance_check = mysqli_query($connect, "select *from credit where phone = $login_session");
                                    while($res = mysqli_fetch_array($balance_check)){
                                        $credit = $res['cardno'];
                                        $bankname = $res['bankname'];
                                        $status1 = "success";
                                        $sms1 = "Pay using your Credit Card";
                                        $pay_form1 = true;
                                    }
                                }else{
                                    $sms1 = "*You have no Credit Card on your data bases, please add first then try again";
                                    $status1 = "Failed";
                                    $pay_form1 = false;
                                }
                        ?>
                        <div>
                            <script>
                                $(document).ready(function(){
                                    $(".paydebit").hide();
                                    $(".paycredit").hide();
                                    $(".paybank").hide();
                                    $("#paydebit").click(function(){
                                        $(".paydebit").show();
                                        $(".paycredit").hide();
                                        $(".paybank").hide();
                                    });
                                    $("#paycredit").click(function(){
                                        $(".paydebit").hide();
                                        $(".paycredit").show();
                                        $(".paybank").hide();
                                    });
                                    $("#paybank").click(function(){
                                        $(".paydebit").hide();
                                        $(".paycredit").hide();
                                        $(".paybank").show();
                                    })
                                });
                            </script>
                            <div>
                                <input type="radio" name="paymethod" id="paydebit" /><label>Debit card : </label>
                                <input type="radio" name="paymethod" id="paycredit" /><label>Credit card : </label>
                                <input type="radio" name="paymethod" id="paybank" disabled /><label>Bank Transfer: </label>
                            </div>
                            <div>
                                <div class="paydebit">
                                    <?php 
                                        if ($pay_form == true){
                                            
                                        }
                                        else{
                                            echo "<h3 style='color: red;'>$sms</h3>";
                                        }
                                    ?>
                                </div>
                                <div class="paycredit">
                                    <?php
                                        if($pay_form1 == true){
                                            
                                        }
                                        else{
                                            echo "<h3 style='color: red;'>$sms1</h3>";
                                        }
                                    ?>
                                </div>
                                <div class="paybank">bank</div>
                            </div>
                        </div>
                    </div>
                                        
                </div>
            </div>
    </body>
</html>
