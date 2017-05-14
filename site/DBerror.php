<?php
    http_response_code(503);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Erreur 503</title>
        <!-- css -->
        <link rel="stylesheet" href="style/style.css">

        <!-- js -->
        <script src="js/jquery-3.1.1.min.js"></script>

        <style media="screen">
            body {
                background-image: url('img/backgrounds/error503.jpg');
            }
        </style>
    </head>
    <body>
        <header>
            <div id="logo">
                <a href="index.php">
                    <!--[if lte IE 8]><img src="img/logo.png" title="Accueil" alt="Logo" style="border-width:0"
                    width="96" height="120" /><![endif]-->
                    <!--[if !IE]> --><img src="img/logo.svg" title="Accueil" alt="Logo" style="border-width:0" width="96" height="120"><!-- <![endif]-->
                </a>
            </div>

                <?php include_once('include/navBarConnect.php') ?>

        </header>
        <?php include_once 'include/footer.php'; ?>
        <script src="js/script.js"></script>
        <script>
            document.getElementsByClassName('list')[0].addEventListener("click", toList);

            /**
             * This function is used select the chosen table.
             */
            function toList() {
                window.location.href = 'insidePages/productList.php';
            }
        </script>
    </body>
</html>
