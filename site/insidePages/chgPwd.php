<?php
    session_set_cookie_params(0);
    session_start();

    if (!isset($_SESSION['current_user_id'])) {
        echo '<script>window.location = "../index.php";</script>';
    } else {
        $current_id = $_SESSION['current_user_id'];
    }
    include('../connexion/verifPWD.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Changement de mot de passe</title>
        <!-- css -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/form_style.css">
        <link rel="stylesheet" href="../style/inside_style.css">
        <link rel="stylesheet" href="../style/chg_style.css">

        <!-- js -->
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script>
            var currentTab = "account";
            var id = "<?php Print($current_id); ?>";
        </script>
        <script>
            /**
             * Désactive le bouton d'envoi tant que le formulaire
             * n'est pas complété.
             */
            $(document).ready(function(){
                $(function () {
                    $("#currentPWD, #newPWD1, #newPWD2").bind("change keyup", function () {
                        if ($("#currentPWD").val() != "" && $("#newPWD1").val() != "" && $("#newPWD2").val() != "") {
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
        <?php include '../include/navBarReserve.php'; ?>

        <h1>Changement de mot de passe</h1>

        <main>
            <?php
                if (empty($_POST['currentPWD'])) {
                    include('../forms/pwdForm.php');
                } else {
                    include('../forms/pwdForm_verif.php');
                }
            ?>
        </main>
        <?php include_once '../include/footer.php'; ?>
        <script src="../js/script.js"></script>
        <script>
            $('.reserves').attr('id', '');
            $('.tabTables').css('display', 'none');

            function cancel() {
                window.location = "page.php";
            }
        </script>
    </body>
</html>
