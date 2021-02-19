<?php
require  "libs/rb-mysql.php";
R::setup( 'mysql:host=eu-cdbr-west-03.cleardb.net;dbname=heroku_a67d63424a7fb8d',
    'b66f1b8d930159', 'dacaa525' );


class DBconnection{
    public static function haveEqualUser($login,$email){
        return  R::count('users',"login=  ? OR email = ?",array($login,md5($email)))>0;
    }
    public static function addUser($login, $email, $password){
        $user = R::dispense('users');
        $user->login = $login;
        $user->email = $email;
        $user->password = md5($password);
        $user->registrasionData=date('l jS \of F Y h:i:s A');
        $user->lastEnter=null;
        $user->status="unblock";
        R::store($user);
    }
    public static function haveUser($email, $password){
        return   R::count('users',"email =  ? and password = ? and status= ?",array($email,md5($password),'unblock'))>0;
    }
    public static function delateUser($id){
        $user = R::load('users', $id);
        if ($user->id == $_SESSION['id']) {
            $isUser = true;
        }
        R::trash($user);
    }
    public static function updateStatus($id,$isUser,$currentUserId){
        $user = R::load('users', $id);
        if ($user->status == 'unblock') {
            $isUser= self::setStatusBlock($user,$currentUserId);
        } else {

            self::setStatusUnblock($user);
        }
        R::store($user);
        return $isUser;
    }
    public static function setStatusBlock($user,$currentUserId){
        $user->status = 'block';
        $isUser=false;
        if ($user->id == $currentUserId) {
            $isUser = true;
        }
        return $isUser;
    }
    public static function setStatusUnblock($user){
        $user->status = 'unblock';
    }
}