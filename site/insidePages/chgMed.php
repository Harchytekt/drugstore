<?php
    session_set_cookie_params(0);
    session_start();

    if (!isset($_SESSION['current_user_id'])) {
        echo '<script>window.location = "../index.php";</script>';
    } else {
        $current_id = $_SESSION['current_user_id'];
    }

    if (!empty($_POST['case']) || !empty($_SESSION['case'])) {
        if (!empty($_POST['case'])) {
            $_SESSION['case'] = $_POST['case'];
            if ($_SESSION['case'] == 'mod') {
                $_SESSION['medicine_id'] = $_POST['mid'];
            }
            $_POST['case']      = null;
            $_POST['mid'] = null;
        } else {
            include('../connexion/verifMed.php');
            ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <?php if ($_SESSION['case'] == 'med') { ?>
                        <title>Ajout</title>
                    <?php } else if ($_SESSION['case'] == 'mod') { ?>
                        <title>Modification</title>
                    <?php } ?>
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
                                $("#name, #dosage, #contr, #noticeLink, #image").bind("change keyup", function () {
                                    if ($("#name").val() != "" && $("#dosage").val() != "" && $("#contr").val() != "" && $("#noticeLink").val() != "") {
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

                    <?php
                        if ($_SESSION['case'] == 'med') { ?>
                            <h1>Ajout d'un médicament</h1> <?php
                        } else if ($_SESSION['case'] == 'mod') { ?>
                            <h1>Modification du médicament</h1> <?php
                        }
                    ?>

                    <main>
                        <?php
                            if ($_SESSION['case'] == 'med') {
                                if (empty($_POST['name'])) {
                                    include('../forms/addMedForm.php');
                                } else {
                                    include('../forms/addMedForm_verif.php');
                                }
                            } else if ($_SESSION['case'] == 'mod') {
                                if (empty($_POST['name'])) {
                                    include('../forms/modMedForm.php');
                                } else {
                                    include('../forms/modMedForm_verif.php');
                                }
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

            <?php
        }
    } else {
        echo '<script>window.location = "page.php";</script>';
    }
?>
