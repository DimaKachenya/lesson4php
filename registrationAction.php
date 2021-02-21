<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "DBconnection.php";

$data=$_POST;



if(DBconnection::haveEqualUser($data['login'],$data['email'])){
    echo "Have user!";
} else {
    DBconnection::addUser($data['login'], $data['email'],$data['password']);
    //echo('<a href="autorization.php">К авторизации</a> ');
    header('https://autorizationform.herokuapp.com/autorization.php');

}