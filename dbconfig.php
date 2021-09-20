<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dbHost = "localhost";
$dbName = "obs";
$dbUser = "root";
$dbPass = "";

$connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName) or die ("Connection failed...");

?>

