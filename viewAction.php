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
    header('https://autorizationform.herokuapp.com/autorization.php');
}else {
    header('https://autorizationform.herokuapp.com/view.php');
}
