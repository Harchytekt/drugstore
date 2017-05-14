<?php

if ($all_ok) {
    $newPWD    = $_POST['newPWD1'];
    $long      = strlen($newPWD);
    $newPWD    = hash('sha512', "+%#" . $long . $newPWD . "¨*§");
    include('../connexion/connexion.php');

    try {
        // set the PDO error mode to exception
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "UPDATE Users SET password = '$newPWD' WHERE user_id = {$_SESSION['current_user_id']};";
        // use exec() because no results are returned
        $bd->exec($str);
        //echo "BD successfully updated!";
    } catch(PDOException $e) {
        //echo $str . "<br>" . $e->getMessage();
        echo '<script>window.location = "../DBerror.php";</script>';
    }

    //$reponse->closeCursor(); // Termine le traitement de la requête
    $bd = null;
    echo '<script>window.location = "page.php";</script>';

} else {

    ?>
    <form action="chgPwd.php" method="post">
        <label class="label">Mot de passe actuel:</label>
        <input class="login" type="password" name="currentPWD" id="currentPWD" value="<?php if($currentPWD_ok && $pwd_isNew) {echo $_POST['currentPWD'];}?>" placeholder=" <?php if (!$currentPWD_ok) {echo "Erreur";} else if (!$pwd_isNew) {echo "Mots de passe identiques";}?>">

        <label class="label">Nouveau mot de passe:</label>
        <input class="login" type="password" name="newPWD1" id="newPWD1" value="<?php if($newPWD1_ok && $pwds_ok && $pwd_isNew) {echo $_POST['newPWD1'];}?>" placeholder=" <?php if (!$newPWD1_ok) {echo "Erreur";} else if (!$pwds_ok) {echo "Mots de passe différents";} else if (!$pwd_isNew) {echo "Mots de passe identiques";}?>" title="Minimum 4 caractères, au moins 1 majuscule, 1 minuscule et 1 chiffre.">

        <label class="label">Nouveau mot de passe:</label>
        <input class="login" type="password" name="newPWD2" id="newPWD2" value="<?php if($newPWD2_ok && $pwds_ok && $pwd_isNew) {echo $_POST['newPWD2'];}?>"
        placeholder=" <?php if (!$newPWD2_ok) {echo "Erreur";} else if (!$pwds_ok) {echo "Mots de passe différents";} else if (!$pwd_isNew) {echo "Mots de passe identiques";}?>" title="Minimum 4 caractères, au moins 1 majuscule, 1 minuscule et 1 chiffre.">

        <div class="changingData wid">
            <div class="btn saveChanges">
                <input type="submit" name="" value="Enregistrer">
            </div>
            <div class="btn cancelChanges" onclick="cancel()">
                <p>Annuler</p>
            </div>
        </div>
    </form>
    <?php

}

?>
