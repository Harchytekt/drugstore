<?php
    session_set_cookie_params(0);
    session_start();

    if (isset($_SESSION['current_user_id'])) {
        echo '<script>window.location = "../insidePages/page.php";</script>';
    }

    include('../connexion/verifLogin.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connexion</title>
        <!-- css -->
            <link rel="stylesheet" href="../style/style.css">
            <link rel="stylesheet" href="../style/form_style.css">
            <link rel="stylesheet" href="../style/connexionPages_style.css">

        <!-- js -->
            <script src="../js/jquery-3.1.1.min.js"></script>

        <style media="screen">
            body {
                background-image: url('../img/backgrounds/logIn.jpg');
            }
        </style>
        <script>
            /**
             * Disable the submit button until an username and
             * a password are entered.
             */
            $(document).ready(function(){
                $(function () {
                    $("#mail, #pwd").bind("change keyup", function () {
                        if ($("#mail").val() != "" && $("#pwd").val() != "") {
                            $(":submit").prop('disabled', false);
                            $(":submit").prop('id', '');
                        } else {
                            $(":submit").prop('disabled', true);
                            $(":submit").prop('id', 'disabled');
                        }
                    });
                });
            });
        </script>
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
            <h1 style="color: #FF8A3F; text-shadow: 5px 5px 4px #606060;">Veuillez entrer vos identifiants</h1>
        </header>
        <main>
            <?php
                if (!empty($_POST['mail'])) {
                    include('../forms/loginForm_verif.php');
                }
                include('../forms/loginForm.php');
            ?>
        </main>
        <?php include_once '../include/footer.php'; ?>
        <script src="../js/script.js"></script>
    </body>
</html>
