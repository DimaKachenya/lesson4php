<?php
require_once "DBconnection.php";
session_start();
$data=$_POST;

if(DBconnection::haveUser($data['email'],$data['password'])){
    $_SESSION['email']=$data['email'];
    $_SESSION['password']=md5($data['password']);
    header('https://autorizationform.herokuapp.com/view.php');
} else {
    echo "No user!";
}