<?php

    if (!empty($_POST['currentPWD'])) {
        $currentPWD_ok = false;
        $newPWD1_ok = false;
        $newPWD2_ok = false;
        $pwds_ok = false;
        $pwd_isNew = true;

        $all_ok = false;


        $pass = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{4,16}$";

        if (preg_match("#$pass#", $_POST['currentPWD'])) {

            $currentPWD  = $_POST['currentPWD'];
            $currentLong = strlen($currentPWD);
            $currentPWD  = hash('sha512', "+%#" . $currentLong . $currentPWD . "¨*§");
            include('../connexion/connexion.php');

            try {
                // set the PDO error mode to exception
                $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $str = "SELECT user_id FROM Users WHERE user_id = {$_SESSION['current_user_id']} AND password <=> '$currentPWD';";
                $reponse = $bd->query($str);
                $donnees = $reponse->fetch();

                $currentPWD_ok = $donnees['user_id'] != null;
            } catch(PDOException $e) {
                //echo $str . "<br>" . $e->getMessage();
                echo '<script>window.location = "../DBerror.php";</script>';
            }

            $reponse->closeCursor(); // Termine le traitement de la requête
            $bd = null;

        }
        if (preg_match("#$pass#", $_POST['newPWD1'])) {
            $newPWD1_ok = true;
        }
        if (preg_match("#$pass#", $_POST['newPWD2'])) {
            $newPWD2_ok = true;
        }
        if ($newPWD1_ok && $newPWD2_ok) {
            $pwds_ok = ($_POST['newPWD1'] == $_POST['newPWD2']);
        }
        if ($pwds_ok) {
            $pwd_isNew = ($_POST['currentPWD'] != $_POST['newPWD1']);
        }

        $all_ok = ($currentPWD_ok && $pwds_ok && $pwd_isNew);
    }

?>
