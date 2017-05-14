<?php
    session_set_cookie_params(0);
    session_start();

    if (!isset($_SESSION['current_user_id'])) {
        echo '<script>window.location = "../index.php";</script>';
    }

    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Choix de l'image</title>
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

            <h1>Choix de l'image</h1>

            <main>
                <?php

                if (empty($_FILES['image'])) {
                    ?>
                    <form action="chooseImage.php" enctype="multipart/form-data" method="post">
                        <label class="label">Choisissez une image du médicament <i>(.png)</i>:</label>
                        <input type="file" accept=".png" name="image" id="image">

                        <div class="changingData wid">
                            <div class="btn saveChanges">
                                <input type="submit" name="" value="Enregistrer">
                            </div>
                        </div>
                    </form>
                    <?php
                } else {
                    $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
                    $path = "../img/meds/{$_SESSION['medicine_id']}.png";
                    $result = move_uploaded_file($_FILES['image']['tmp_name'], $path);
                    //echo "$result - $path";
                    $_SESSION['medicine_id'] = null;
                    echo '<script>window.location = "../insidePages/page.php";</script>';
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
