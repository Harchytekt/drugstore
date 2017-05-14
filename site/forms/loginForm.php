<form action="loginPage.php" method="post">
    <label class="label">Adresse mail: </label>
    <input class="login" type="text" name="mail" id="mail">

    <label class="label">Mot de passe: </label>
    <input class="login" type="password" name="pwd" id="pwd">

    <input type="submit" value="Connexion" id="disabled" disabled>
    <br>
    <?php
        if (isset($_GET['state'])) {
            if ($_GET['state'] == '0') {
               echo "<span id='incorrect'>Login incorrect !</span>";
           } else if ($_GET['state'] == '1') {
              echo "<span id='created'>Le compte a bien été créé !</span>";
          }
       }
    ?>
</form>
