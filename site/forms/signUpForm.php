<form action="signuPage.php" method="post">
    <div class="left">
        <label class="label">Nom<sup class="t">*</sup>: </label>
        <input class="login" type="text" name="last" id="lname">

        <label class="label">Nom d'utilisateur<sup class="t">*</sup>: </label>
        <input class="login" type="text" name="uname" id="uname" title="Entre 3 et 24 caractères.">

        <label class="label">Mot de passe<sup class="t">*</sup>: </label>
        <input class="login" type="password" name="pwd1" id="pwd1" title="Minimum 4 caractères, au moins 1 majuscule, 1 minuscule et 1 chiffre.">
    </div>
    <div class="right">
        <label class="label">Prénom<sup class="t">*</sup>: </label>
        <input class="login" type="text" name="first" id="fname">

        <label class="label">Adresse mail<sup class="t">*</sup>: </label>
        <input class="login" type="text" name="mail" id="mail">

        <label class="label">Mot de passe<sup class="t">*</sup>: </label>
        <input class="login" type="password" name="pwd2" id="pwd2" title="Minimum 4 caractères, au moins 1 majuscule, 1 minuscule et 1 chiffre.">
    </div>
    <div class="clear"></div>

    <input type="submit" value="Enregistrement" id="disabled" disabled>
</form>
