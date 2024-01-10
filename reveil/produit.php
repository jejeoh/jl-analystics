<?php
    $adv = 1;
    include 'lib/includes.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produit.css">
    <title>Reveil</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
</head>

<body>
    <header class="acti">
        <a href="index.php"><img style="height:8vh" src="assets/logo.png" alt="logo"></a>
    </header>
    <section class="prod">
        <div class="phot">
            <div class="allim">
                <img src="assets/photo0.webp" class="act" alt="photo0">
                <img src="assets/photo1.webp" alt="photo1">
                <img src="assets/photo2.webp" alt="photo2">
            </div>
            <div class="choi">
                <img src="assets/photo0.webp" onclick="chang(1)" alt="photo0">
                <img src="assets/photo1.webp" onclick="chang(2)" alt="photo1">
                <img src="assets/photo2.webp" onclick="chang(3)" alt="photo2">

            </div>
        </div>
        <div class="sele">
            <form action="#" method="post">
                <div class="color">
                    <div class="inp">
                        <input title="Noir de Jais" type="radio" name="color" value="black" id="black" checked>
                        <span class="bl"></span>
                    </div>
                    <div class="inp">
                        <input title="Blanc tourterelle" type="radio" name="color" value="white" id="white">
                        <span class="wh"></span>
                    </div>
                    <div class="inp">
                        <input title="Rose dragée" type="radio" name="color" value="pink" id="pink">
                        <span class="pi"></span>
                    </div>


                </div>
                <div class="other">
                    <div class="title">
                        <h2 class="ti">Réveil Enceinte multi-fonctions</h2>
                    </div>
                    <div class="price">
                        <h3 class="prix">29.99 €</h3>
                    </div>
                    <div class="quanti">
                        <h4 class="qu">1</h4>
                        <div class="aju" id="plus" onclick="add();">+</div>
                        <div class="aju" id="moin" onclick="moin();">-</div>
                    </div>
                    <input type="hidden" name="quantite" value="1" class="hide">
                    <div class="comma">
                        <div class="commander" onclick="share();">Commander</div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="obj">
        <div class="inf">
            <div class="circle"><img src="assets/tempe.png" alt="thermomètre" class="in"></div>
            <div class="expla">
                <h4 class="exp">Thermomètre intégré</h4>
            </div>
        </div>
        <div class="inf">
            <div class="circle"><img src="assets/music.png" alt="enceinte" class="in"></div>
            <div class="expla">
                <h4 class="exp">Enceinte intégrée</h4>
            </div>
        </div>
        <div class="inf">
            <div class="circle"><img src="assets/blue.png" alt="Bluetooth" class="in"></div>
            <div class="expla">
                <h4 class="exp">Connectable Bluetooth</h4>
            </div>
        </div>
        <div class="inf">
            <div class="circle"><img src="assets/charg.png" alt="Bluetooth" class="in"></div>
            <div class="expla">
                <h4 class="exp">Batterie incluse</h4>
            </div>
        </div>
    </section>
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

        var nombr = document.querySelector('div.quanti h4.qu');
        var inp = document.querySelector('input.hide');

        function add() {
            if (nombr.textContent < 10) {
                nombr.textContent++;
                inp.value++;
            }
        }
        function moin() {
            if (nombr.textContent > 1) {
                nombr.textContent--;
                inp.value--;
            }
        }
        var affich = 1;

        function chang(nombre) {
            if (affich != nombre) {
                document.querySelector("div.allim img.act").classList.toggle('act');
                affich = nombre;
                document.querySelector("div.allim img:nth-child(" + nombre + ")").classList.toggle('act');
            }
        }
        
        var color = "black";

        function share() {

            if(document.getElementById('black').checked){
                color = "Noir";
            }else if(document.getElementById('white').checked){
                color = "Blanc";
            }else{
                color = "Rose";
            }




            var formData = new FormData();
            formData.append('color', color);
            formData.append('quanti', nombr.textContent);

            var options = {
                method: 'POST',
                body: formData
            };

            fetch('serveur.php', options)
                .then(function (response) {
                    if (response.ok) {
                        console.log('Requête réussie !');
                        document.location.href="checkout.php"; 
                    } else {
                        console.log('Erreur lors de la requête : ' + response.status);
                    }
                })
                .catch(function (error) {
                    console.log('Erreur de connexion : ' + error);
                });
        }


    </script>

</body>

</html>