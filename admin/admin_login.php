<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
    </head>
    <body>
        <?php
        // put your code here
        include_once 'dbconfig.php';
        //current date and time
             $now = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
             echo $now->format('d-m-Y H:i:s a');
             
            session_start();
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = mysqli_real_escape_string($connect,$_POST['id']);
                $password = mysqli_real_escape_string($connect,$_POST['pass']);
                
                $date = $_POST['date'];

                $sql = "select *from admin where admin_id = '$username' and pass = '$password'";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $active = $row['admin_id'];
                $count = mysqli_num_rows($result);

                if($count == 1){
                    $save = mysqli_query($connect, "insert into adminlogin(admin_id, datetime) values('$username','$date')");
                    $_SESSION['login_user'] = $username;
                    header("location: admin_welcome.php");
                }else{
                    echo '<script>swal("Wrong!", "username or password wrong", "error")</script>';
                }
            }
        ?>
        <div>
            <div class="container">
                <form action="admin_login.php" method="post" name="myform">
                    <input type="text" name="id" placeholder="Please enter your ID" autocomplete="off" /><br/>
                    <input type="password" name="pass" placeholder="Please enter your password" /><br/>
                    <input type="hidden" name="date" value="<?php echo $now->format('d-m-Y H:i:s a'); ?>" />
                    <input type="submit" name="submit" value="Login" />
                </form>
            </div>
        </div>
    </body>
</html>
