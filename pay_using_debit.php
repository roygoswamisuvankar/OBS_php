<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Balance to wallet</title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
        // put your code here
        include_once 'dbconfig.php';
        include_once 'usersession.php';
        
        //$debitcard = mysqli_query($connect, "Select *from debit where ")
        $now = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        $date = $now->format('d-m-Y H:i:s a');
        $purpose = 'Wallet Recharge';
        
        if(isset($_POST['pay'])){
            
            $id = $_POST['id'];
            $bankname = $_POST['bankname'];
            $cardno = $_POST['cardno'];
            $cvv = $_POST['cvv'];
            $pin = $_POST['pin'];
            $curbalance = $_POST['balance'];
            
            //md5 hashing
            $mpin = md5($pin);
            
            //previous balance fetch
            $prev_bal = mysqli_query($connect, "select *from wallet where phone = $login_session");
            while($res_bal = mysqli_fetch_array($prev_bal)){
                $previous_bal = $res_bal['balance'];
            }
            
            //debit card data
            $debitcard = mysqli_query($connect, "select *from debit where id = $id");
            
            while($res = mysqli_fetch_array($debitcard)){
                $debitcvv = $res['cvv'];
                $debitpin = $res['pin'];
            }
            
            if($cvv != $debitcvv){
                $tran_id = rand();
                $status = 'Failed';
                $mode = 'Debit';
                
                $insertinto = mysqli_query($connect, "insert into transaction(tran_id, method, cardno, phone, datetime, status, purpose, amount) values('$tran_id','$mode','$cardno','$login_session','$date','$status','$purpose','$curbalance')");
                
                echo '<script>swal({
                                      title: "Error!",
                                      text: "Your CVV number is wrong!",
                                      icon: "error"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
            }
            else if($mpin != $debitpin){
                $tran_id = rand();
                $status = 'Failed';
                $mode = 'Debit';
                
                $insertinto = mysqli_query($connect, "insert into transaction(tran_id, method, cardno, phone, datetime, status, purpose, amount) values('$tran_id','$mode','$cardno','$login_session','$date','$status','$purpose','$curbalance')");
                
                echo '<script>swal({
                                      title: "Error!",
                                      text: "Your Pin is wrong!",
                                      icon: "error"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
            }
            else{
                $tran_id = rand();
                $status = 'Success';
                $mode = 'Debit';
                
                $insertinto = mysqli_query($connect, "insert into transaction(tran_id, method, cardno, phone, datetime, status, purpose, amount) values('$tran_id','$mode','$cardno','$login_session','$date','$status','$purpose','$curbalance')");
                $sum = $previous_bal + $curbalance;
                $insertbal = mysqli_query($connect,"update wallet set balance = $sum where phone = $login_session");
                
                $for_purpose = 'Credit';
                $insert_wallet_his = mysqli_query($connect, "insert into wallet_statement(tran_id, phone, datetime, purpose, amount) values('$tran_id','$login_session','$date','$for_purpose','$curbalance')");
                
                echo '<script>swal({
                                      title: "Success!",
                                      text: "Balance added into your wallet successfully!",
                                      icon: "success"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
            }
        }
        ?>
    </body>
</html>
