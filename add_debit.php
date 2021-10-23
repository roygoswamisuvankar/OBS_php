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
        <link href="css/style2.css" rel="stylesheet" type="text/css"/>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        include_once 'usersession.php';
        include_once 'dbconfig.php';
        
        $result = mysqli_query($connect, "select *from debit");
        
        
        ?>
        <?php
        if(isset($_POST['save'])){
            
            $bank = $_POST['bank'];
            $phone = $_POST['phone'];
            $cardno = $_POST['cardno'];
            $holder = $_POST['holder'];
            $cvv = $_POST['cvv'];
            $expire = $_POST['date'];
           
            
            //encryption
            //$pin_encrypt = md5($pin);
            while($res = mysqli_fetch_array($result)){
                
                if($res['cardno'] == $cardno){
                    echo '<script>swal({
                                        title: "Error!",
                                        text: "Card Number already used please try another!",
                                        icon: "warning"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
                }
            else{
                    $query = ("insert into debit(phone, cardno, holder, cvv, expire, bankname) values('$phone','$cardno','$holder','$cvv','$expire','$bank')");
                    if(mysqli_query($connect, $query)){
                        echo '<script>swal({
                                        title: "Success!",
                                        text: "Your Card Saved Successfully",
                                        icon: "success"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
                    }
                }
            }
        }
        
        ?>
    </body>
</html>
