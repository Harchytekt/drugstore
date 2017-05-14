<?php include('../connexion/verifSignUp.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inscription</title>
        <!-- css -->
            <link rel="stylesheet" href="../style/style.css">
            <link rel="stylesheet" href="../style/form_style.css">
            <link rel="stylesheet" href="../style/connexionPages_style.css">

        <!-- js -->
            <script src="../js/jquery-3.1.1.min.js"></script>

        <style media="screen">
            body {
                background-image: url('../img/backgrounds/signUp.jpg');
            }
            form input.login {
                width: 60%;
            }
        </style>
        <script>
            /**
             * Disable the submit button until an username and
             * a password are entered.
             */
            $(document).ready(function(){
                $(function () {
                    $("#lname, #uname, #pwd1, #fname, #mail, #pwd2").bind("change keyup", function () {
                        if ($("#lname").val() != "" && $("#uname").val() != "" && $("#pwd1").val() != "" && $("#fname").val() != "" && $("#mail").val() != "" && $("#pwd2").val() != "") {
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
            <h1 style="color: #FF8A3F; text-shadow: 5px 5px 4px #606060;">Veuillez entrer vos données</h1>
        </header>
        <main>
            <?php
                if (empty($_POST['uname'])) {
                    include('../forms/signUpForm.php');
                } else {
                    include('../forms/signUpForm_verif.php');
                }
            ?>
        </main>
        <?php include_once '../include/footer.php'; ?>
        <script src="../js/script.js"></script>
    </body>
</html>
