<?php
require_once "DBconnection.php";
session_start();

$data=$_POST;
$isUser=false;
if($data['choise']=='delete'){
    foreach ($data as $id){
        DBconnection::delateUser($id);
    }
}else{
    foreach ($data as $id){
        $isUser=DBconnection::updateStatus($id,$isUser,$_SESSION['id']);
    }
}

if($isUser){
    header('Location: http://localhost/dashboard/Lesson4PHP/autorization.php');
}else {
    header('Location: http://localhost/dashboard/Lesson4PHP/view.php');
}
