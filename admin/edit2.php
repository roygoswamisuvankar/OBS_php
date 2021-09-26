<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Edit</title>
    </head>
    <body>
        <?php
        include_once 'session.php';
            include_once 'dbconfig.php';
            
            if(isset($_POST['update'])){
                                    $id = $_POST['id'];
                                    $fname = $_POST['fname'];
                                    $lname = $_POST['lname'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $dob = $_POST['dob'];
                                    $gender = $_POST['gender'];
                                    
                                    $updating = mysqli_query($connect, "Update user set fname = '$fname', lname = '$lname', email = '$email', phone = '$phone', dob = '$dob', gender = '$gender' where id = $id");
                                    header("Location: admin_welcome.php");
                                }
        ?>
    </body>
</html>
