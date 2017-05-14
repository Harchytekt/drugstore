<?php
    session_start();

    if(!empty($_POST['uid'])) {
        include '../connexion/connexion.php';
        try {
            $pwd = "EpcCM98";
            $pwd = hash('sha512', "+%#7" . $pwd . "¨*§");
            // set the PDO error mode to exception
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $str = "UPDATE Users SET password = '$pwd' WHERE user_id = {$_POST['uid']};";
            // use exec() because no results are returned
            $bd->exec($str);
        } catch(PDOException $e) {
            //echo $str . "<br>" . $e->getMessage();
            echo '<script>window.location = "../DBerror.php";</script>';
        }
        $bd = null;
    }
?>
