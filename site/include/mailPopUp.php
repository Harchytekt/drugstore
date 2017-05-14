<?php
    session_start();

    if (!empty($_POST['mail'])) {
        $_SESSION['destMail'] = htmlentities(addslashes($_POST['mail']));
    }
?>

<div id="close">
    <img src="../img/close.svg" height="32" width="32" class="clickableImg">
</div>
<p>De: <?php echo "{$_SESSION['current_mail']}"; ?></p>
<p>À: <?php echo "{$_SESSION['destMail']}"; ?></p>
<form class="" action="../actions/mail.php" method="post">
    <textarea class="mail" name="body" rows="8" cols="80" placeholder="Votre message"></textarea>
    <input class="mail" type="submit" value="Envoyer le mail">
</form>
<script>
    $('#close').click(function() {
        $("#popup").css("display", "none");
    });
</script>
