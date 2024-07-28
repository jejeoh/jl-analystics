<?php
if(!isset($_POST["info"])){
    echo "test2";
    die();
}

$info = json_decode($_POST["info"]);

$dbhost = "localhost";
$dbname = "data";
$dbuser = "root";
$dbpassword = "";
try{
    $db = new PDO('mysql:host=' . $dbhost .';dbname=' . $dbname, $dbuser, $dbpassword);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    echo 'connexion reussite';
}catch (Exception $e){
    echo 'Impossible de se conecter à la base de donnée';
    echo $e->getMessage();
    die();
}

$ip = $db->quote($info[4]);
$country = $db->quote($info[0]);
$lang = $db->quote($info[3]);
$os = $db->quote($info[2]);
$nav = $db->quote($info[1]);

$db->query("INSERT INTO `users` (`ip`, `country`, `Language`, `os`, `navigateur`) VALUES ($ip, $country, $lang, $os, $nav)");

echo 'Succes';
?>