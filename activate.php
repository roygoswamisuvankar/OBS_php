<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Activated</title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
        include_once 'usersession.php';
        include_once 'dbconfig.php';

        $phone = $login_session;
        $balance = 0;

        $insert_balance = mysqli_query($connect, "insert into wallet(phone, balance) values('$phone',$balance)");
        
        echo '<script>swal({
                                      title: "Activated!",
                                      text: "Your Wallet successfully activated",
                                      icon: "success"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
        ?>
    </body>
</html>
