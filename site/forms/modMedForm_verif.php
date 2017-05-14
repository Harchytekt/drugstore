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
        $str = "UPDATE Medicines SET name = '$name', dosage = '$dosage', contraindications = \"$contr\", noticeLink = '$link' WHERE medicine_id = {$_SESSION['medicine_id']};";
        // use exec() because no results are returned
        $bd->exec($str);
        //echo "New record created successfully";
    } catch(PDOException $e) {
        //echo $str . "<br>" . $e->getMessage();
        echo '<script>window.location = "../DBerror.php";</script>';
    }

    ?>
    <script>
    if (confirm("Voulez-bous modifier l'image du médicament ?")) {
        window.location = "chooseImage.php";
    } else {
        window.location = "../insidePages/page.php?tab=2";
    }
    </script>
    <?php


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
