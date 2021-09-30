<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>user page</title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
        // put your code here
        include_once 'dbconfig.php';
        //current date and time
             $now = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
             //echo $now->format('d-m-Y H:i:s a');
             
            session_start();
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = mysqli_real_escape_string($connect,$_POST['username']);
                $password = mysqli_real_escape_string($connect,$_POST['pass']);
                
                //md5 encryption
                $password_encrypt = md5($password);
                
                $date = $now->format('d-m-Y H:i:s a');

                $sql = "select *from user2 where phone = '$username' and password = '$password_encrypt'";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

               // $active = $row['admin_id'];
                $count = mysqli_num_rows($result);

                if($count == 1){
                    $save = mysqli_query($connect, "insert into user_login_history(phone, datetime) values('$username','$date')");
                    $_SESSION['login_user'] = $username;
                    header("location: user_welcome.php");
                }else{
                    echo '<script>swal({
                                      title: "Error!",
                                      text: "User ID or Password is wrong!",
                                      icon: "error"
                                    }).then(function() {
                                            window.location = "login.php";
                                    });</script>';
                }
            }
        ?>
    </body>
</html>
