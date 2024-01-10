<?php
$adv = 0;
include '../lib/includes.php';

if(isset($_SESSION['Auth']['id'])){
    header('Location:' . WEBROOT . 'admin/index.php');
    die();
}


if(isset($_POST['user']) && isset($_POST['password'])){
    if(!($_POST['user'] == "" || $_POST['password'] == "" )){
        $user = $db->quote(sha1("42vb3x82rw5583pihi9i8mva73" . $_POST['user']));
        $select = $db->query("SELECT * FROM `admin` WHERE `user`=$user");
        if($select->rowCount() > 0){
            $result = $select->fetch();
            if(password_verify($_POST['password'], $result['password'])){
                $_SESSION['Auth'] = $result;
                header('Location:' . WEBROOT . 'admin/index.php');
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="#" method="post">
        <input type="text" name="user">
        <input type="password" name="password">
        <input type="submit" value="done">
    </form>
</body>
</html>