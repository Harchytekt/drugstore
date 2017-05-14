<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Liste des médicaments</title>
        <!-- css -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/inside_style.css">
        <link rel="stylesheet" href="../style/slider.css" />

        <!-- js -->
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/jquery.cslide.js" type="text/javascript"></script>
        <script>
        $(document).ready(function(){
            $("#cslide-slides").cslide();
        });
        </script>
        <style media="screen">
            div .line {
                cursor: default;
            }
            div#med0.med.button, .choose {
                display: none;
            }
        </style>
    </head>
    <body>
        <header>
            <div id="logo">
                <a href="../index.php">
                    <!--[if lte IE 8]><img src="../img/logo.png" title="Accueil" alt="Logo" style="border-width:0"
                    width="96" height="120" /><![endif]-->
                    <!--[if !IE]> --><img src="../img/logo.svg" title="Accueil" alt="Logo" style="border-width:0" width="96" height="120"><!-- <![endif]-->
                </a>
            </div>

        </header>
        <main>
            <div id="center">
                <?php
                    include '../connexion/connexion.php';
                    ?>
                    <div id="medicinesTable">
                        <?php include '../include/medicines.php'; ?>
                    </div>
            </div>
            <?php
            $reponse->closeCursor(); // Termine le traitement de la requête
            $bd = null;
            ?>
        </main>
        <?php include_once '../include/footer.php'; ?>
        <script src="../js/script.js"></script>
    </body>
</html>
