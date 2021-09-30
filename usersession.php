<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'dbconfig.php';
   
session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connect,"select *from user2 where phone = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['phone'];
   $fname = $row['fname'];
   $lname = $row['lname'];
   //$login_session2 = $row['phone'];*/
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
   
?>
