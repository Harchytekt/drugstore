<?php
    session_start();

    if(!empty($_POST['case']) && !empty($_POST['uid']) && !empty($_POST['mid'])) {
        include '../connexion/connexion.php';
        try {
            // set the PDO error mode to exception
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $str = "SELECT list_id FROM Lists WHERE user_id = {$_POST['uid']} AND medicine_id = {$_POST['mid']};";
            $reponse = $bd->query($str);
            $donnees = $reponse->fetch();
            if ($_POST['case'] == "add" && $donnees['list_id'] == null) {
                $reponse->closeCursor(); // Termine le traitement de la requête
                $str = "INSERT INTO Lists (user_id, medicine_id) VALUES ({$_POST['uid']}, {$_POST['mid']});";
                //use exec() because no results are returned
                $bd->exec($str);
            } else if ($_POST['case'] = "rem" && $donnees['list_id'] != null) {
                $lid = $donnees['list_id'];
                $reponse->closeCursor(); // Termine le traitement de la requête
                $str = "DELETE FROM Lists WHERE list_id = $lid;";
                //use exec() because no results are returned
                $bd->exec($str);
            }

        } catch(PDOException $e) {
            //echo $str . "<br>" . $e->getMessage();
            echo '<script>window.location = "../DBerror.php";</script>';
        }
        $bd = null;
    }
?>
