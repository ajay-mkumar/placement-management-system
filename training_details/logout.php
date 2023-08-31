<?php
session_start();
$_SESSION['count']=0;
header('location:login.php');
?>