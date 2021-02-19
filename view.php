
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <?php
    require_once "DBconnection.php";
    session_start();
    $userEmail=$_SESSION['email'];
    $userPassword=$_SESSION['password'];
    $user=R::find('users','email= ? and password = ?',array($userEmail,$userPassword));
    foreach ($user as $a){
        $updateUser=R::load('users',$a['id']);
        $updateUser->lastEnter=date('l jS \of F Y h:i:s A');
        R::store($updateUser);
    }
    $users=R::find('users','id> ? ',[0]);
    ?>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="js/viewJS.js"></script>
</head>
<body>
<form action="viewAction.php" method="post">
    <p>Current user: <br/>
        <?php
        foreach ($user as $a){
            echo('<b>Login:</b> '.$a['login'].'<br/>');
            echo('<b>E-mail:</b> '.$a['email']);
            $_SESSION['id']=$a['id'];
        }

        ?>
    </p>
    <div>
        block,unblock/delete
        <input type="checkbox" name="choise" value="delete">
    </div>
    <table class="table table-striped table-bordered" id="root-id">
        <thead >
        <tr>
            <td>SELECT ALL<input type="checkbox" onclick="selectAll()" id="select_all"> </td>
            <td>ID</td>
            <td>LOGIN</td>
            <td>EMAIL</td>
            <td>PASSWORD</td>
            <td>REGISTRATION DATA</td>
            <td>LAST ENTER</td>
            <td>STATUS</td>
        </tr>
        </thead >
        <?php
        foreach ($users as $a){
            echo('<tr>');
            echo ('<td> <input type="checkbox" onclick="displayMainCheckBox()" class="checkbox-input" name="'.$a['id'].'" value="'.$a['id'].'"/> </td>');
            echo('<td>'.$a['id'].'</td>');
            echo('<td>'.$a['login'].'</td>');
            echo('<td>'.$a['email'].'</td>');
            echo('<td>'.$a['password'].'</td>');
            echo('<td>'.$a['registrasionData'].'</td>');
            echo('<td>'.$a['lastEnter'].'</td>');
            echo('<td>'.$a['status'].'</td>');
            echo(' </tr> ');
        }
        ?>
    </table>
    <input type="submit" class="btn btn-primary" value="BLock/Unblock">
</form>
</body>
</html>