<?php

    if (!empty($_POST['name'])) {
        $new_name = false;
        $name_ok = false;
        $dosage_ok = false;
        $contr_ok = false;
        $link_ok = false;

        $all_ok = false;

        $letters = "[A-ZÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒa-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]";
        $name = "^($letters+([ ]?$letters?[-]?$letters+)*)$";
        $dosage = "(\d+[ ]?[mg]?[g])(;?)+";
        $link = "([--:\w\?\@\%\&\+\~\#\=]*\.[a-z]{2,4}\/{0,2})((?:[?&](?:\w+)=(?:\w+))+|[--:\w\?\@\%\&\+\~\#\=]+)?";
        $sentences = "(.*?)([\!]|[\?]|([\.]{1,3})){1}";

        if (preg_match("#$name#", $_POST['name'])) {
            $name_ok = true;
        }
        if (preg_match("#$dosage#", $_POST['dosage'])) {
            $dosage_ok = true;
        }
        if (preg_match("#$sentences#", $_POST['contr'])) {
            $contr_ok = true;
            $_POST['contr'] = preg_replace('#([\!]|[\?]|([\.]{1,3})){1}#', '.<br>', $_POST['contr']);
        }
        if (preg_match("#$link#", $_POST['noticeLink'])) {
            $link_ok = true;
        }

        if ($name_ok && $_SESSION['case'] == 'med') {
            include('../connexion/connexion.php');
            $str = "SELECT medicine_id FROM Medicines WHERE name = '{$_POST['name']}';";
            $reponse = $bd->prepare($str);
            $reponse->execute();
            $donnees = $reponse->fetch();
            if ($donnees['medicine_id'] == null) {
                $new_name = true;
            }
            $reponse->closeCursor(); // Termine le traitement de la requête
            $bd = null;
        } else if ($_SESSION['case'] == 'mod') {
            $new_name = true;
        }

        $all_ok = ($name_ok && $new_name && $dosage_ok && $contr_ok && $link_ok);
    }

?>
