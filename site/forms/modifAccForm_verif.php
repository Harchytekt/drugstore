<?php

if ($all_ok) {
    //echo "<h1>Congratulation !</h1>";
    $lastname   = $_POST['last'];
    $firstname  = $_POST['first'];
    $mail       = $_POST['mail'];
    include('../connexion/connexion.php');

    try {
        // set the PDO error mode to exception
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "UPDATE Users SET lastname = '$lastname', firstname = '$firstname', mail = '$mail' WHERE user_id = $uid;";
        // use exec() because no results are returned
        $bd->exec($str);
        //echo "New record created successfully";
    } catch(PDOException $e) {
        //echo $str . "<br>" . $e->getMessage();
        echo '<script>window.location = "../DBerror.php";</script>';
    }

    $bd = null;
    echo '<script>window.location = "page.php?tab=3";</script>';

} else {

    ?>
    <form action="page.php?tab=3" method="post">
        <input type="text" name="user_id" id="hidden" value="<?php echo $donnees['user_id']; ?>">
        <label class="label">Nom de famille:</label>
        <input class="login" type="text" name="last" id="last" value="<?php if($last_ok) {echo $_POST['last'];}?>" placeholder=" <?php if (!$last_ok) {echo "Erreur";}?>">

        <label class="label">Prénom:</label>
        <input class="login" type="text" name="first" id="first" value="<?php if($first_ok) {echo $_POST['first'];}?>" placeholder=" <?php if (!$first_ok) {echo "Erreur";}?>">

        <label class="label">Adresse mail:</label>
        <input class="login" type="text" name="mail" value="<?php if($mail_ok && $new_mail) {echo $_POST['mail'];}?>" placeholder=" <?php if (!$mail_ok) {echo "Erreur";} else if (!$new_mail) {echo "Déjà utilisée";}?>">
        <div class="btn changeData" onclick="changeData()">
            <p>Modifier les données</p>
        </div>
        <div class="changingData">
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
