<?php
    include '../connexion/connexion.php';
    $reponse  = $bd->prepare("SELECT * FROM Medicines WHERE medicine_id = {$_SESSION['medicine_id']};");
    $reponse->execute();
    $donnees  = $reponse->fetch();
?>

<form action="chgMed.php" method="post">
    <label class="label">Nom:</label>
    <input class="form" type="text" name="name" id="name" value="<?php echo $donnees['name']; ?>">

    <label class="label">Dosage:</label>
    <input class="form" type="text" name="dosage" id="dosage" value="<?php echo $donnees['dosage']; ?>">

    <label class="label">Contre-indications:</label>
    <textarea class="form" name="contr" id="contr" rows="8" cols="30"><?php echo $donnees['contraindications'];?></textarea>

    <label class="label">Lien vers la notice:</label>
    <input class="form" type="text" name="noticeLink" id="noticeLink" value="<?php echo $donnees['noticeLink']; ?>">

    <div class="changingData wid">
        <div class="btn saveChanges">
            <input type="submit" name="" value="Enregistrer" id="disabled" disabled>
        </div>
        <div class="btn cancelChanges" onclick="cancel()">
            <p>Annuler</p>
        </div>
    </div>
</form>
