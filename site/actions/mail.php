<?php
    session_start();

	$toMail   = $_SESSION['destMail'];
	$fromMail = $_SESSION['current_mail'];
	$body     = $_POST['body'];
	if (!empty($body)) {
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $toMail)) {
			// On filtre les serveurs qui rencontrent des bogues.
			$passage_ligne = "\r\n";
		} else {
			$passage_ligne = "\n";
		}
		//==========

		//=====Création de la boundary
		$boundary = "-----=".md5(rand());
		//==========

		//=====Définition du sujet.
        if ($fromMail == "admin@drugstore.be") {
            $sujet = "Infos | Drugstore";
        } else {
            $sujet = "Question | Drugstore";
        }
		//=========

		//=====Création du header de l'e-mail.
		$header = "From: <$fromMail>".$passage_ligne;
		$header.= "Reply-to: <$fromMail>".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		//==========

		//=====Création du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message
		$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$body.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		//==========

		//=====Envoi de l'e-mail.
		mail($toMail,$sujet,$message,$header);
		//==========
	}
	echo '<script>window.location = "../insidePages/page.php?tab=1";</script>';
?>
