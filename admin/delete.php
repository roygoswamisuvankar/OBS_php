<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        include_once 'dbconfig.php';
        include_once 'session.php';
        
        $id = $_GET['id'];
        $delete = mysqli_query($connect, "Delete from user where id=$id");
        header("Location: admin_welcome.php");
        ?>
    </body>
</html>
