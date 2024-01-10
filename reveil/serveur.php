<?php
    $adv = 0;
    include 'lib/includes.php';

    if(isset($_POST['color']) && isset($_POST['quanti'])){
        if(isset($_SESSION['command'])) $_SESSION['command'] = [];
        $_SESSION['command']['color'] =  $_POST['color'];
        $_SESSION['command']['quanti'] =  $_POST['quanti'];
    }
    if(isset($_POST['done'])){



        $nom = $db->quote($_SESSION['command']['nom']);
        $prenom = $db->quote($_SESSION['command']['prenom']);
        $adresse = $db->quote($_SESSION['command']['adresse']);
        $tel = $db->quote($_SESSION['command']['tel']);
        $email = $db->quote($_SESSION['command']['email']);
        $objet = $db->quote($_SESSION['command']['quanti'] . " " . $_SESSION['command']['color'] );
        $db->query("INSERT INTO `commandes` (`id`, `nom`, `prenom`, `adresse`, `tel`, `email`, `object`, `statut`) VALUES (NULL, $nom, $prenom, $adresse, $tel, $email, $objet, 0)");

        $id = $db->query("SELECT * FROM `commandes` WHERE `email` = $email");
        $id = $id->fetch();
        $id = $id['id'];

        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Reve-eil.rf.gd"<reveil.multi@gmail.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
        
        $message='
        <html>
            <body>
            Merci pour votre commande <br/> 
            <a href="http://localhost/reveil/lib/advence-livraisons.php?id=' . $id . '">Clickez ici pour voir le detail de votre commande</a>
            </body>
        </html>
        ';
        
        mail($_SESSION['command']['email'], "Veuillez suivre votre commande ici", $message, $header);
        
        
            
        $_SESSION = array();
        $_SESSION['great'] = true;

    }   
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['tel']) && isset($_POST['email'])){
        $_SESSION['command']['nom'] = $_POST['nom'];
        $_SESSION['command']['prenom'] = $_POST['prenom'];
        $_SESSION['command']['adresse'] = $_POST['adresse'];
        $_SESSION['command']['tel'] = $_POST['tel'];
        $_SESSION['command']['email'] = $_POST['email'];
    }



