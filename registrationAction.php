<?php
require_once "DBconnection.php";

$data=$_POST;



if(DBconnection::haveEqualUser($data['login'],$data['email'])){
    echo "Have user!";
} else {
    DBconnection::addUser($data['login'], $data['email'],$data['password']);
    header('Location: http://localhost/dashboard/Lesson4PHP/autorization.php');

}