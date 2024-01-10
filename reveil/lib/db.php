<?php 
try{
    $db = new PDO('mysql:host=localhost;dbname=commerce', 'root', '');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch (Exception $e){
    echo 'Impossible de se conecter à la base de donnée';
    echo $e->getMessage();
    die();
}
?>