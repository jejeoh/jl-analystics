<?php
$adv = 0;
include 'includes.php';

if(!isset($_GET["id"])){
    die();
}
$id = $db->quote($_GET["id"]);
$select = $db->query("SELECT * FROM `commandes` WHERE `id` = $id");
if($select->rowCount() != 1){
    die();
}
$result = $select->fetch();

$livraison = $result['statut'];

$motif = array();
$motif[0] = "Commande en envoie aux entrepots";
$motif[1] = "Commande traiter aux entrepots";
$motif[2] = "Commande traiter par les services de livraisons";
$motif[3] = "expedition à votre dommicile";
$motif[4] = "Livré";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraison</title>

    <style>
        body{
            text-align: center;
        }
        img{
            height: 40vh;
        }
        h2{
            font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
            font-size: 3vw;
        }
        div.span{
            width: 70vw;
            height: 5vh;
            margin-left: 15%;
            border-radius: 50px;
            display: flex;
            position: absolute;
            z-index: 3;
        }
        div.back{
            width: 70vw;
            height: 5vh;
            background: #bebebe;
            margin-left: 15%;
            border-radius: 50px;
            position: absolute;

        }
        div.line{
            width: <?= 7 + $livraison*14 ?>vw;
            height: 5vh;
            margin-left: 15%;
            border-radius: 50px;
            background: linear-gradient(90deg, rgba(103,154,185,1) 0%, rgba(236,78,211,1) 100%);
            position: absolute;
            z-index: 2;
        }
        span{
            width: 5vh;
            height: 5vh;
            background: #fff;
            border-radius: 50%;
            margin: auto;
        }
    </style>

</head>
<body>
    <img src="../assets/livraison.jpg" alt="livraison">
    <h2><?= $motif[$livraison]; ?></h2>
    <div class="span">
        <span></span><span></span><span></span><span></span><span></span>
    </div> 
    <div class="line">
    </div>
       <div class="back">

    </div>


</body>
</html>