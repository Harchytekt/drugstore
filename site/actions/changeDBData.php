<?php
    session_set_cookie_params(0);
    session_start();

    if (!empty($_POST['lastname']) && !empty($_POST['firstname']) &&
    !empty($_POST['mail'])) {
        $lastname   = htmlentities(addslashes($_POST['lastname']));
        $firstname  = htmlentities(addslashes($_POST['firstname']));
        $mail       = htmlentities(addslashes($_POST['mail']));
    }
?>

<?php include '../connexion/connexion.php'; ?>

<?php

    try {
        // set the PDO error mode to exception
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "UPDATE Users SET lastname = '$lastname', firstname = '$firstname', mail = '$mail' WHERE user_id = {$_SESSION['current_user_id']};";
        // use exec() because no results are returned
        $bd->exec($str);
        //echo "BD successfully updated!";
    } catch(PDOException $e) {
        //echo $str . "<br>" . $e->getMessage();
        echo '<script>window.location = "../DBerror.php";</script>';
    }

    $bd = null;
    echo '<script>window.location = "../insidePages/page.php";</script>';
?>
