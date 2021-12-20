<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Money Transfer</title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
        // put your code here
        include_once 'dbconfig.php';
        include_once 'usersession.php';
        
        if(isset($_POST['pay'])){
            $phnumber = $_POST['acno'];
            $amount = $_POST['amt'];
            
            $now = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
            $date = $now->format('d-m-Y H:i:s a');
            $purpose = "Money Transfer";
            
            if(is_numeric($phnumber) && strlen($phnumber)== 10){
                if(is_numeric($amount)){
                    
                    /*who sent money*/
                    $result = mysqli_query($connect, "select *from wallet where phone = $login_session");
                    while($res = mysqli_fetch_array($result)){
                        $balance1 = $res['balance'];
                        
                        
                    }
                    
                    if($balance1>=$amount){
                    /*from where sent money
                     * 
                     */
                    $result2 = mysqli_query($connect, "select *from wallet where phone = $phnumber");
                    if(mysqli_num_rows($result2)){
                        while($res1 = mysqli_fetch_array($result2)){
                            $balance2 = $res1['balance'];
                        }
                        
                        /*who sent money, he reduce his balance*/
                        $cur_balance1 = $balance1 - $amount;
                        /*to whome sent money, he increase his balance*/
                        $cur_balance2 = $balance2 + $amount;
                        
                        //echo $cur_balance1;
                        //echo $cur_balance2;
                        
                        $update_wallet1 = mysqli_query($connect, "update wallet set balance = '$cur_balance1' where phone = $login_session");
                        $update_wallet2 = mysqli_query($connect, "update wallet set balance = '$cur_balance2' where phone = $phnumber");
                        
                        /*save transaction history*/
                        $tran_id = rand();
                        $status = 'Success';
                        $mode = 'Wallet';
                        
                        
                        
                        $insertinto = mysqli_query($connect, "insert into transaction(tran_id, method, cardno, phone, datetime, status, purpose, amount) values('$tran_id','$mode','$phnumber','$login_session','$date','$status','$purpose','$amount')");
                        
                        $for_purpose = 'Debit';
                        $insert_wallet_his = mysqli_query($connect, "insert into wallet_statement(tran_id, phone, datetime, purpose, amount) values('$tran_id','$login_session','$date','$for_purpose','$amount')");
                
                        echo '<script>swal({
                                      title: "Success!",
                                      text: "Money transfer successfully",
                                      icon: "success"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
                        
                    
                        
                    }else{
                        echo '<script>swal({
                                      title: "Error!",
                                      text: "This username does not exits",
                                      icon: "error"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
                    }
                }else{
                    
                    $tran_id = rand();
                        $status = 'Failed';
                        $mode = 'Wallet';
                        
                        $amount = 'Insufficient wallet balance';
                        
                        $insertinto = mysqli_query($connect, "insert into transaction(tran_id, method, cardno, phone, datetime, status, purpose, amount) values('$tran_id','$mode','$phnumber','$login_session','$date','$status','$purpose','$amount')");
                        
                    
                    echo '<script>swal({
                                      title: "Error!",
                                      text: "Insufficient wallet Balance",
                                      icon: "error"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
                }
                 //endif
                    
                }else{
                    
                    $tran_id = rand();
                        $status = 'Failed';
                        $mode = 'Wallet';
                        
                        
                        $amount = ' ';
                        $insertinto = mysqli_query($connect, "insert into transaction(tran_id, method, cardno, phone, datetime, status, purpose, amount) values('$tran_id','$mode','$phnumber','$login_session','$date','$status','$purpose','$amount')");
                        
                    echo '<script>swal({
                                      title: "Error!",
                                      text: "*Please enter valid ammount",
                                      icon: "error"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
                }
            }else{
                
                $tran_id = rand();
                        $status = 'Failed';
                        $mode = 'Wallet';
                        
                        
                        $amount = ' ';
                        $insertinto = mysqli_query($connect, "insert into transaction(tran_id, method, cardno, phone, datetime, status, purpose, amount) values('$tran_id','$mode','$phnumber','$login_session','$date','$status','$purpose','$amount')");
                        
                echo '<script>swal({
                                      title: "Error!",
                                      text: "*Please enter valid phone number",
                                      icon: "error"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
            }
            
        }
        ?>
    </body>
</html>
