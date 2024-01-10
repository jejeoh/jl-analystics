<?php
    $adv = 0;
    include 'lib/includes.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
</head>
<body>
    <header class="acti">
        <a href="#"><img  style="height:8vh" src="assets/logo.png" alt="logo"></a>
    </header>
    <section class="prem">
        <div class="part">
            <img src="assets/white.png" alt="reveil blanc" class="full">
        </div>
        <div class="part">
            <div class="txt">
                <div class="titl">
                    <h3 class="titrepart">Le réveil enceinte</h3>
                </div>
                <div class="parag">
                    <p class="expl">Ce radio-réveil est équipé d'une enceinte <br>
                        connectée au Bluetooth, d'un thermomètre,<br>
                        d'une batterie ainsi que son cable de charge</p>
                </div>
                <div class="comm">
                    <a href="produit.php" class="com">Je commande -></a>
                </div>
            </div>
        </div>
    </section>
    <section class="seg">
        
        <div class="part">
            <div class="txt">
                <div class="titl">
                    <h3 class="titrepart">Plusieurs couleurs</h3>
                </div>
                <div class="parag">
                    <p class="expl">En effet, ce réveil vous est proposé en <br>
                        plusieurs coloris. Nous avons le noir de <br>
                        Jais, le blanc tourterelle et le rose dragée
                    </p>
                </div>
                <div class="comm">
                    <a href="produit.php" class="com">Je commande -></a>
                </div>
            </div>
        </div>
        <div class="part">
            <img src="assets/black.png" alt="reveil blanc" class="full">
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
    <section class="commande">
        <a href="produit.php">Je commande</a>
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


        
    </script>

</body>
</html>