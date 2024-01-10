<?php
session_start();

if(isset($auth)){
    if(!isset($_SESSION['Auth']['id'])){
        header('Location:' . WEBROOT . 'admin/login.php');
        die();
    }
}
if(isset($control)){
    if(!isset($_SESSION['great'])){
        die();
    }
    
}
if(isset($_SESSION['vue'])){
    if($_SESSION['adv'] < $adv){
        $_SESSION['adv'] = $adv;
        $ip = $db->quote($_SERVER['REMOTE_ADDR']);
        $db->query("UPDATE `vue` SET `advence` = '$adv' WHERE `ip` = $ip");
        
    }
}
if(!isset($_SESSION['vue'])){
    $_SESSION['vue'] = true;
    $_SESSION['adv'] = $adv;
    $ip = $db->quote($_SERVER['REMOTE_ADDR']);
    $select = $db->query("SELECT id FROM vue WHERE ip=$ip");
    if($select->rowCount() < 1){
        date_default_timezone_set('Europe/Berlin');
        $anne = date('Y');
        $mois = date('m');
        $jour = date('d');
        $heure = date('H');


        $db->query("INSERT INTO `vue` (`id`, `ip`, `anne`, `mois`, `day`, `heure`, `advence`) VALUES (NULL, $ip, '$anne', '$mois', '$jour', '$heure', '$adv')");

    }
}


if(!isset($_SESSION['csrf'])){
    $_SESSION['csrf'] = md5(time() + rand());
}

function csrf(){
    return 'csrf='. $_SESSION['csrf'];
}

function csrfInput(){
    return '<input type="hidden" value="' . $_SESSION['csrf'] . '" name="csrf">';
}

function checkCsrf(){
    if(
        (isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf']) ||
        (isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['csrf'])
    ){
        return true;
    }
}
?>
