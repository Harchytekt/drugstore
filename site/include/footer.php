<footer>
    <div id="centerFooter"><p> Copyright © 2017 </p></div>
    <?php if (isset($_SESSION['current_user_id'])) {
        if ($_SESSION['current_user_id'] != 1) { ?>
    <div class="contact foot">
        <div class="sendmail" id="mid<?php echo $_SESSION['admin_mail']; ?>" title="Adresser un mail">
            Contacter l'administrateur
        </div>
    </div>
    <?php }
} ?>
</footer>
