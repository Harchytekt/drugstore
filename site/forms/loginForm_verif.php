<?php

if ($all_ok) {
    $mail       = $_POST['mail'];
    $pwd        = $_POST['pwd'];
    $long       = strlen($pwd);
    $pwd        = hash('sha512', "+%#" . $long . $pwd . "¨*§");
    include '../connexion/connexion.php';

    $str = "SELECT user_id, active FROM Users WHERE mail <=> '$mail' AND password <=> '$pwd';";
    $reponse = $bd->prepare($str);
    $reponse->execute();
    $donnees = $reponse->fetch();
    if ($donnees['user_id'] == null OR $donnees['active'] == 0) {
        $target = "connexion/loginPage.php?state=0";
    } else {
        $target = "insidePages/page.php";
        $_SESSION['current_user_id'] = $donnees['user_id'];
        $_SESSION['current_mail'] = $mail;
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
    $bd = null;
    echo '<script>window.location = "../',$target,'";</script>';
} else {
    echo '<script>window.location = "../connexion/loginPage.php?state=0";</script>';
}

?>
