<?php

    if (!empty($_POST['mail'])) {
        $mail_ok = false;
        $pwd_ok = false;

        $all_ok = false;


        $pass = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{4,16}$";
        $mail = "^([0-9a-zA-Z].*?@([0-9a-zA-Z].*\.\w{2,4}))$";

        if (preg_match("#$mail#", $_POST['mail'])) {
            $mail_ok = true;
        }
        if (preg_match("#$pass#", $_POST['pwd'])) {
            $pwd_ok = true;
        }

        $all_ok = ($mail_ok && $pwd_ok);
    }

?>
