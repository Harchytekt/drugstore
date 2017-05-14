<?php
    include('../connexion/verifModifAcc.php');
    if ($all_ok) {
    $lastname   = $_POST['last'];
    $firstname  = $_POST['first'];
    $mail       = $_POST['mail'];
    $uid        = $_POST['user_id'];
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

}
    $bd = null;
    echo '<script>window.location = "../insidePages/page.php?tab=4";</script>';
?>
