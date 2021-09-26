<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quick Cash</title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
        // put your code here
        include_once 'dbconfig.php';
        include_once 'session.php';
        
        $data = mysqli_query($connect, "select *from user");
        
        if(isset($_POST['save'])){
            
            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $document = $_POST['document'];
            $card_no = $_POST['card_no'];
            $password = $_POST['pass'];
            $byname = $_POST['byname'];
            $datetime = $_POST['datetime'];
            
            //encrypting method of passwords
            $pass2 = md5($password);
            
            while($res = mysqli_fetch_array($data)){
                
                
                    
                    $query = ("insert into user2(id,fname,lname,email,phone,dob,gender,document,card_no,password,byname,datetime) values('$id','$fname','$lname','$email','$phone','$dob','$gender','$document','$card_no','$pass2','$byname','$datetime')");
        
                    if(mysqli_query($connect,$query)){
                        echo '<script>swal({
                                                title: "Approved",
                                                text: "Password & Login id Sent to the customer..",
                                                icon: "success"
                                            }).then(function() {
                                                window.location = "admin_welcome.php";
                                            });</script>';                
                    }
                }
            }
        
        ?>
    </body>
</html>
