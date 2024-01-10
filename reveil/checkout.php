<?php 
    $adv = 2;
    include 'lib/includes.php';
    if(!isset($_SESSION['command']['color']) || !isset($_SESSION['command']['quanti'])){
        header('Location:' . WEBROOT . 'index.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="check.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Reveil</title>
</head>

<body>
    <header class="acti">
        <a href="index.php"><img style="height:8vh" src="assets/logo.png" alt="logo"></a>
    </header>
    <section class="all">
        <section class="left">
            <div class="somm">
                <div class="prod">
                    <h5><?= $_SESSION['command']['quanti']; ?>x Reveil multi-fonction - <?= $_SESSION['command']['color'];?></h6>
                        <h6>29.99</h6>
                </div>
                <div class="tot">
                    <h5>Total</h6>
                        <h6><?= $_SESSION['command']['quanti'] * 29.99?> </h6>
                </div>
            </div>
            <div class="slid">
                <div class="carrous">
                    <div class="img">
                        <img src="assets/black.png" alt="noir">
                        <img src="assets/white.png" alt="blanc">
                        <img src="assets/pink.png" alt="rose">
                    </div>
                </div>
                <div class="cursor">
                    <span class="act"></span><span></span><span></span>
                </div>
            </div>
        </section>
        <section class="right">
            <div class="wh">
                <div class="alll">
                    <div class="rig">
                        <div class="name">
                            <input type="text" id="nom" name="nom" placeholder="Nom">
                            <input type="text" id="prenom" name="prenom" placeholder="Prenom">
                        </div>
                        <div class="name">
                            <input type="text" id="ville" name="ville" placeholder="Ville">
                            <input type="text" id="postal" name="postal" placeholder="Code Postal">
                        </div>
                        <div class="inp">
                            <input type="text" id="adresse" name="adresse" placeholder="Adresse">
                        </div>
                        <div class="inp">
                            <input type="text" id="mail" name="mail" placeholder="Adresse Mail">
                        </div>
                        <div class="inp">
                            <input type="text" id="tel" name="tel" placeholder="Numero de Telephone">
                        </div>

                        <div class="suiv">
                            <div class="bout" onclick="after();">Suivant</div>
                        </div>
                    </div>
                    <div class="lef">
                        <div class="paypalbut">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <script
        src="https://www.paypal.com/sdk/js?client-id=Af5rEm9o9ZcczdJnNaObi2VZ2gV6hxGDyQ6bAQ_sA6fJQ2-V2M-D0lxh62oMOHLb7hAljVyllpFKSeDB&currency=EUR"></script>
    <script >
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "<?= $_SESSION['command']['quanti'] * 29.99?>"
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function(details) {
                    var formData = new FormData();
                formData.append('done', '3');

                var options = {
                    method: 'POST',
                    body: formData
                };

                fetch('serveur.php', options)
                    .then(function (response) {
                        if (response.ok) {
                            console.log('Requête réussie !');
                        } else {
                            console.log('Erreur lors de la requête : ' + response.status);
                        }
                    })
                    .catch(function (error) {
                        console.log('Erreur de connexion : ' + error);
                    });
                        document.location.href="thanks.php"; 
                });
            }
        }).render('#paypal-button-container');    
    </script>

    <script>
        var scrolll = 0;
        var valid = true;
        document.addEventListener("scroll", (event) => {

            if (window.scrollY > scrolll && valid) {
                valid = false;
                document.querySelector("header").classList.toggle('acti')
            }
            if (window.scrollY < scrolll && !valid) {
                valid = true;
                document.querySelector("header").classList.toggle('acti')
            }
            scrolll = window.scrollY;

        });
    </script>

    <script>
        var adv = document.querySelector('div.img');
        var eta = 0;
        function avence() {
            var ot = eta + 1;
            document.querySelector("div.cursor span:nth-child(" + ot + ")").classList.toggle('act');
            if (eta < 2) { eta++; }
            else { eta = 0; }
            adv.style.left = "-" + eta + "00%";
            ot = eta + 1;
            document.querySelector("div.cursor span:nth-child(" + ot + ")").classList.toggle('act');
        }
        setInterval(avence, 5000);
        var adresse = document.getElementById('adresse');
        var nom = document.getElementById('nom');
        var prenom = document.getElementById('prenom');
        var mail = document.getElementById('mail');
        var tel = document.getElementById('tel');
        var ville = document.getElementById('ville');
        var postal = document.getElementById('postal');

        function after() {

            if(nom.value == "" || adresse.value == "" || prenom.value == "" || ville.value == "" || postal.value == "" || tel.value == ""){
                alert("Des champs sont vides");
                return;
            }
            if (!mail.value.match(/[a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]+/i)) {
                alert(mail.value + " n'est pas une adresse valide");
                return;
            }

            if(document.querySelector('div.alll').style.left != 0){
                return;
            }else{
                document.querySelector('div.alll').style.left = '-100%';


                var formData = new FormData();
                formData.append('nom', nom.value);
                formData.append('prenom', prenom.value);
                formData.append('adresse', adresse.value + " " + ville.value + " " + postal.value);
                formData.append('tel', tel.value);
                formData.append('email', mail.value);


                var options = {
                    method: 'POST',
                    body: formData
                };

                fetch('serveur.php', options)
                    .then(function (response) {
                        if (response.ok) {
                            console.log('Requête réussie !');
                        } else {
                            console.log('Erreur lors de la requête : ' + response.status);
                        }
                    })
                    .catch(function (error) {
                        console.log('Erreur de connexion : ' + error);
                    });


            }
        }


    </script>

</body>

</html>