<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Debit</title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
        include_once 'dbconfig.php';
        include_once 'usersession.php';
        
        $id = $_GET['id'];
        
        $result = mysqli_query($connect, "delete from debit where id = $id");
        echo '<script>swal({
                                        title: "Success!",
                                        text: "Your Card deleted Successfully",
                                        icon: "success"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
        ?>
    </body>
</html>
