<?php

if ($all_ok) {
    $lastname   = $_POST['last'];
    $firstname  = $_POST['first'];
    $username   = $_POST['uname'];
    $mail       = $_POST['mail'];
    $pwd        = $_POST['pwd1'];
    $long       = strlen($pwd);
    $pwd        = hash('sha512', "+%#" . $long . $pwd . "¨*§");
    include('../connexion/connexion.php');

    try {
        // set the PDO error mode to exception
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "INSERT INTO Users (lastname, firstname, username, password, mail) VALUES ('$lastname', '$firstname', '$username', '$pwd', '$mail');";
        // use exec() because no results are returned
        $bd->exec($str);
        //echo "New record created successfully";
    } catch(PDOException $e) {
        //echo $str . "<br>" . $e->getMessage();
        echo '<script>window.location = "../DBerror.php";</script>';
    }

    //$reponse->closeCursor(); // Termine le traitement de la requête
    $bd = null;
    echo '<script>window.location = "loginPage.php?state=1";</script>';

} else {

    ?>
    <form action="signuPage.php" method="post">
        <div class="left">
            <label class="label">Nom<sup class="t">*</sup>: </label>
            <input class="login" type="text" name="last" id="lname" value="<?php if($last_ok) {echo $_POST['last'];}?>" placeholder=" <?php if (!$last_ok) {echo "Erreur";}?>">

            <label class="label">Nom d'utilisateur<sup class="t">*</sup>: </label>
            <input class="login" type="text" name="uname" id="uname" value="<?php if($uname_ok && $new_uname) {echo $_POST['uname'];}?>" placeholder=" <?php if (!$uname_ok) {echo "Erreur";} else if (!$new_uname) {echo "Déjà utilisé";}?>" title="Entre 3 et 24 caractères.">

            <label class="label">Mot de passe<sup class="t">*</sup>: </label>
            <input class="login" type="password" name="pwd1" id="pwd1" value="<?php if($pwd1_ok && $pwds_ok) {echo $_POST['pwd1'];}?>" placeholder=" <?php if (!$pwd1_ok) {echo "Erreur";} elseif (!$pwds_ok) {echo "Mots de passe différents";}?>" title="Minimum 4 caractères, au moins 1 majuscule, 1 minuscule et 1 chiffre.">
        </div>
        <div class="right">
            <label class="label">Prénom<sup class="t">*</sup>: </label>
            <input class="login" type="text" name="first" id="fname" value="<?php if($first_ok) {echo $_POST['first'];}?>" placeholder=" <?php if (!$first_ok) {echo "Erreur";}?>">

            <label class="label">Adresse mail<sup class="t">*</sup>: </label>
            <input class="login" type="text" name="mail" id="mail" value="<?php if($mail_ok && $new_mail) {echo $_POST['mail'];}?>" placeholder=" <?php if (!$mail_ok) {echo "Erreur";} else if (!$new_mail) {echo "Déjà utilisée";}?>">

            <label class="label">Mot de passe<sup class="t">*</sup>: </label>
            <input class="login" type="password" name="pwd2" id="pwd2" value="<?php if($pwd2_ok && $pwds_ok) {echo $_POST['pwd2'];}?>" placeholder=" <?php if (!$pwd2_ok) {echo "Erreur";} elseif (!$pwds_ok) {echo "Mots de passe différents";}?>" title="Minimum 4 caractères, au moins 1 majuscule, 1 minuscule et 1 chiffre.">
        </div>
        <div class="clear"></div>

        <input type="submit" value="Enregistrement" id="disabled" disabled>
    </form>
    <?php

}

?>
