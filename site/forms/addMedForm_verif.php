<?php

if ($all_ok) {
    $name    = $_POST['name'];
    $dosage  = $_POST['dosage'];
    $contr   = $_POST['contr'];
    $link    = $_POST['noticeLink'];
    include('../connexion/connexion.php');

    try {
        // set the PDO error mode to exception
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "INSERT INTO Medicines (name, dosage, contraindications, noticeLink) VALUES ('$name', '$dosage', \"$contr\", '$link');";
        // use exec() because no results are returned
        $bd->exec($str);
        //echo "New record created successfully";
    } catch(PDOException $e) {
        //echo $str . "<br>" . $e->getMessage();
        echo '<script>window.location = "../DBerror.php";</script>';
    }


    try {
        // set the PDO error mode to exception
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "SELECT medicine_id FROM Medicines WHERE name = '{$_POST['name']}';";
        $reponse = $bd->prepare($str);
        $reponse->execute();
        $donnees = $reponse->fetch();
    } catch(PDOException $e) {
        //echo $str . "<br>" . $e->getMessage();
        echo '<script>window.location = "../DBerror.php";</script>';
    }

    if (!empty($donnees['medicine_id'])) {
        $_SESSION['medicine_id'] = $donnees['medicine_id'];
        echo '<script>window.location = "chooseImage.php";</script>';
    }

    $reponse->closeCursor(); // Termine le traitement de la requête
    $bd = null;

} else {

    ?>
    <form action="chgMed.php" method="post">
        <label class="label">Nom:</label>
        <input class="form" type="text" name="name" id="name" value="<?php if($name_ok && $new_name) {echo $_POST['name'];}?>" placeholder=" <?php if (!$name_ok) {echo "Erreur";} else if (!$new_name) {echo "Déjà enregistré";}?>">

        <label class="label">Dosage:</label>
        <input class="form" type="text" name="dosage" id="dosage" value="<?php if($dosage_ok) {echo $_POST['dosage'];}?>" placeholder=" <?php if (!$dosage_ok) {echo "Erreur";}?>">

        <label class="label">Contre-indications:</label>
        <textarea class="form" name="contr" id="contr" rows="8" cols="30" placeholder=" <?php if (!$contr_ok) {echo "Erreur";}?>" ><?php if($contr_ok) {echo $_POST['contr'];}?></textarea>

        <label class="label">Lien vers la notice:</label>
        <input class="form" type="text" name="noticeLink" id="noticeLink" value="<?php if($link_ok) {echo $_POST['noticeLink'];}?>" placeholder=" <?php if (!$link_ok) {echo "Erreur";}?>">

        <div class="changingData wid">
            <div class="btn saveChanges">
                <input type="submit" name="" value="Enregistrer" id="disabled" disabled>
            </div>
            <div class="btn cancelChanges" onclick="cancel()">
                <p>Annuler</p>
            </div>
        </div>
    </form>
    <?php

}

?>
