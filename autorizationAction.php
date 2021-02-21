<?php
session_start();
require_once "DBconnection.php";

$data=$_POST;

if(DBconnection::haveUser($data['email'],$data['password'])){
    $_SESSION['email']=$data['email'];
    $_SESSION['password']=md5($data['password']);
    //echo('<a href="view.php">К глвной</a> ');
    header('https://autorizationform.herokuapp.com/view.php');
} else {
    echo "No user!";
}