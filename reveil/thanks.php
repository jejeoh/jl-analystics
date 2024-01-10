<?php
    $control = 1;
    $adv = 3;
    include 'lib/includes.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="thanks.css">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
</head>

<body>
    <header class="acti">
        <a href="index.php"><img style="height:8vh" src="assets/logo.png" alt="logo"></a>
    </header>
    <section class="all">
        <div class="centr">
            <h1 class="title">
                Merci pour votre commande
            </h1>
            <h3 class="autre">
                vous recevrez les informations de livraison par mail
            </h3>
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


    </script>
</body>

</html>