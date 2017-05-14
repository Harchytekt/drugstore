<?php
    session_set_cookie_params(0);
    session_start();

    if (!isset($_SESSION['current_user_id'])) {
        echo '<script>window.location = "../index.php";</script>';
    } else {
        $current_id = $_SESSION['current_user_id'];
        include '../connexion/connexion.php';
        $reponse = $bd->prepare("SELECT mail FROM Users WHERE user_id = 1;");
        $reponse->execute();
        $donnees = $reponse->fetch();
        $_SESSION['admin_mail'] = $donnees['mail'];
        $reponse->closeCursor(); // Termine le traitement de la requête
        $bd = null;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reserves</title>
        <!-- css -->
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/inside_style.css">
        <link rel="stylesheet" href="../style/slider.css" />

        <!-- js -->
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/jquery.cslide.js"></script>

        <script>
            $(document).ready(function(){
                $("#cslide-slides").cslide();
            });

            var currentTab = "reserves";
            var id = "<?php Print($current_id); ?>";
        </script>
    </head>
    <body>
        <?php include '../include/navBarReserve.php'; ?>
        <main>
            <div id="center">
                <?php include '../connexion/connexion.php'; ?>
                <div id="popup"></div>

                <?php
                    if (!empty($_GET['tab'])) {
                        if ($current_id == '1' && $_GET['tab'] == '4') { ?>
                            <div id="usersTable">
                                <?php include '../include/users.php'; ?>
                            </div><?php
                        } else if ($_GET['tab'] == '1') { ?>
                            <div id="reservesTable">
                                <?php include '../include/reserves.php'; ?>
                            </div><?php
                        } else if ($_GET['tab'] == '2') { ?>
                            <div id="medicinesTable">
                                <?php include '../include/medicines.php'; ?>
                            </div><?php
                        } else if ($_GET['tab'] == '3') { ?>
                            <div id="accountTable">
                                <?php include '../include/account.php'; ?>
                            </div><?php
                        }
                    }
                ?>
            </div>
            <?php
                $reponse->closeCursor(); // Termine le traitement de la requête
                $bd = null;
            ?>
            <div id="clear">
            </div>
        </main>
        <?php include_once '../include/footer.php'; ?>
        <script src="../js/script.js"></script>
        <?php
            if (isset($_GET['tab'])) {
                if ($_GET['tab'] == '4') { ?>
                    <script>setCurrentTab('users');</script> <?php
                } else if ($_GET['tab'] == '1') { ?>
                    <script>setCurrentTab('reserves');</script> <?php
                } else if ($_GET['tab'] == '2') { ?>
                    <script>setCurrentTab('medicines');</script> <?php
                } else if ($_GET['tab'] == '3') { ?>
                    <script>setCurrentTab('account');</script> <?php
                }
            } else {
                echo '<script>window.location = "page.php?tab=1";</script>';
            }
        ?>
        <script>

            $('.line').click(function() {
                $.post("../include/medsPopUp.php", {med_id: $(this).parent().attr('class')});

                $('#popup').load('../include/medsPopUp.php');
                $("#popup").css("display", "block");
            });

            $('.button').click(function() {
                var value = $(this).attr('class').substr(0, 3);
                var itemValue = $(this).attr('id').substr(3);

                if (itemValue != null) {
                    if (value == "rei") {
                        var uid = $(this).attr('id').substr(3);
                        $.post("../actions/reinitPWD.php", {uid: uid});
                        window.location = "page.php?tab=4";
                    } else if (value == "med" || value == "mod") {
                        $.post("chgMed.php", {case: value, mid: itemValue});
                        window.location = "chgMed.php";
                    } else if (value == "add" || value == "rem") {
                        $.post("../actions/addMedToList.php", {case: value, uid: id, mid: itemValue});
                        window.location = "page.php";
                    } else {
                        value = (value == "act") ? '1' : '2';
                        //alert(value + " " + itemValue);
                        $.post("../actions/activateUser.php", {state: value, user_updating: itemValue});
                        window.location = "page.php?tab=4";
                    }
                }
            });

            $('.updateData').click(function() {
                var itemValue = $(this).attr('id').substr(3);

                if (itemValue != null) {
                    if (itemValue == 1) {
                        window.location = "page.php?tab=3";
                    } else {
                        $.post("../include/updateDataPopUp.php", {updateID: itemValue});
                        $('#popup').load('../include/updateDataPopUp.php');
                        $("#popup").css("display", "block");
                    }
                }
            });
            $('.sendmail').click(function() {
                var itemValue = $(this).attr('id').substr(3);

                if (itemValue != null) {
                    $.post("../include/mailPopUp.php", {mail: itemValue});
                } else {
                    $.post("../include/mailPopUp.php", {mail: '<?php echo $_SESSION['admin_mail']; ?>'});
                }
                $('#popup').load('../include/mailPopUp.php');
                $("#popup").css("display", "block");
            });

            function changeData() {
                $('input').prop('disabled', false);
                $('.changeData').css('display', 'none');
                $('.changingData').css('display', 'block');
            }
            function cancel() {
                $('input').prop('disabled', true);
                $('.changeData').css('display', 'block');
                $('.changingData').css('display', 'none');
            }

            window.onpageshow = function(event) {
                if (event.persisted) { window.location.reload(); }
            };
        </script>
    </body>
</html>
