<form action="page.php?tab=3" method="post">
    <label class="label">Nom de famille:</label>
    <input class="login" type="text" name="last" id="last" value="<?php echo $donnees['lastname']; ?>" disabled>

    <label class="label">Prénom:</label>
    <input class="login" type="text" name="first" id="first" value="<?php echo $donnees['firstname']; ?>" disabled>

    <label class="label">Adresse mail:</label>
    <input class="login" type="text" name="mail" value="<?php echo $donnees['mail']; ?>" disabled>
    <br>
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
