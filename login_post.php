<?php
session_start();
include('include/config.php');
$name           =   $_POST["name"];
$password          =   $_POST["password"];
$select_query   = "SELECT COUNT(*) as login_succ FROM user WHERE name='$name' and pass='$password'";
$select_result  = mysqli_query($db_connect,$select_query);
$after_assoc    = mysqli_fetch_assoc($select_result);
if($after_assoc["login_succ"]==1){
    $_SESSION["login"]= "login success";
    $_SESSION["login_succ"] = "Login successfull";
    header('location:user.php');
}else{
    $mass   = "Email and password are not match";
    header('location:login.php?err_mass='.$mass);
}


?>