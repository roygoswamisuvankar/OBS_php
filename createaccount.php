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
                include_once 'dbconfig.php';
                //fetch some data from database user
                $result = mysqli_query($connect, "Select *from user");
        ?>
<?php
    //create account of the user

    if(isset($_POST['submit'])){
        
        //this fields are coming from php webpage fields,
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dob = $_POST['date'];
        $gender = $_POST['gender'];
        $document = $_POST['document'];
        $card_no = $_POST['card_no'];
        
        //calculate age
        $dateofbirth = new DateTime($dob);
        $now = new DateTime();
        
        $diff = $now->diff($dateofbirth);
        
        echo $diff->y;
        
        while($res = mysqli_fetch_array($result)){
            //check email already exits or not
            if($res['email'] == $email){
                echo '<script>swal({
                                      title: "Error!",
                                      text: "This email id already used, please try another!",
                                      icon: "warning"
                                    }).then(function() {
                                            window.location = "login.php";
                                    });</script>';
            }
            //check phone number already exits or not
            elseif($res['phone'] == $phone){
                echo '<script>swal({
                                        title: "Error!",
                                        text: "This phone number already used, please try another!",
                                        icon: "warning"
                                    }).then(function() {
                                            window.location = "login.php";
                                    });</script>';
            }
            //check card no. ID already exits or not
            elseif($res['card_no'] == $card_no){
                echo '<script>swal({
                                        title: "Error!",
                                        text: "Please enter valid ID number",
                                        icon: "warning"
                                    }).then(function() {
                                            window.location = "login.php";
                                    });</script>';
            }
            //check user is 18 years old or not
            elseif($diff->y < 18){
                echo '<script>swal({
                                        title: "Error!",
                                        text: "User maust be 18 years old required",
                                        icon: "warning"
                                    }).then(function() {
                                            window.location = "login.php";
                                    });</script>';
            }
            //after all checking data will be saved in data base user
            else{
                $query = ("insert into user(fname,lname,email,phone,dob,gender,document,card_no) values('$fname','$lname','$email','$phone','$dob','$gender','$document','$card_no')");
        
                if(mysqli_query($connect,$query)){
                    echo '<script>swal({
                                            title: "Good Job!",
                                            text: "Your Account is created successfully, We are get back to you soon!",
                                            icon: "success"
                                        }).then(function() {
                                            window.location = "login.php";
                                        });</script>';                
                }
            }
        }
    }
?>


    </body>
</html>
