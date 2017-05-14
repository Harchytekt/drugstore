<?php

    if (!empty($_POST['uname'])) {
        $new_uname = false;
        $uname_ok = false;
        $last_ok = false;
        $first_ok = false;
        $pwd1_ok = false;
        $pwd2_ok = false;
        $pwds_ok = false;
        $mail_ok = false;
        $new_mail = false;

        $all_ok = false;

        $letters = "[A-ZÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒa-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]";
        $name = "^($letters+([ ]?$letters?[-]?$letters+)*)$";
        $pass = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{4,16}$";
        $mail = "^([0-9a-zA-Z].*?@([0-9a-zA-Z].*\.\w{2,4}))$";

        if (preg_match("#(?!.*[\.\-\_]{2,})^[a-zA-Z0-9\.\-\_]{3,24}$#", $_POST['uname'])) {
            $uname_ok = true;
        }
        if (preg_match("#$name#", $_POST['last'])) {
            $last_ok = true;
        }
        if (preg_match("#$name#", $_POST['first'])) {
            $first_ok = true;
        }
        if (preg_match("#$pass#", $_POST['pwd1'])) {
            $pwd1_ok = true;
        }
        if (preg_match("#$pass#", $_POST['pwd2'])) {
            $pwd2_ok = true;
        }
        if ($pwd1_ok && $pwd2_ok) {
            $pwds_ok = ($_POST['pwd1'] == $_POST['pwd2']);
        }
        if (preg_match("#$mail#", $_POST['mail'])) {
            $mail_ok = true;
        }

        if ($uname_ok) {
            include('../connexion/connexion.php');
            $str = "SELECT user_id FROM Users WHERE username = '{$_POST['uname']}';";
            $reponse = $bd->query($str);
            $donnees = $reponse->fetch();
            if ($donnees['user_id'] == null) {
                $new_uname = true;
            }
            $reponse->closeCursor(); // Termine le traitement de la requête
            $bd = null;
        }
        if ($mail_ok) {
            include('../connexion/connexion.php');
            $str = "SELECT user_id FROM Users WHERE mail = '{$_POST['mail']}';";
            $reponse = $bd->query($str);
            $donnees = $reponse->fetch();
            if ($donnees['user_id'] == null) {
                $new_mail = true;
            }
            $reponse->closeCursor(); // Termine le traitement de la requête
            $bd = null;
        }

        $all_ok = ($uname_ok && $new_uname && $last_ok && $first_ok && $pwds_ok && $new_mail);
    }

?>
