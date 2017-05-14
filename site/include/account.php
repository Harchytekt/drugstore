<?php
    $reponse  = $bd->query("SELECT * FROM Users WHERE user_id = {$_SESSION['current_user_id']};");
    $donnees  = $reponse->fetch();
    $username = $donnees['username'];
    $uid      = $donnees['user_id'];
    include('../connexion/verifModifAcc.php');
?>
<h1>Bienvenue <?php echo $username; ?> !</h1>

<div class="left">

    <?php
        if (!empty($_POST['last'])) {
            include('../forms/modifAccForm_verif.php');
        } else {
            include('../forms/modifAccForm.php');
        }
    ?>
</div>
<div class="right">
    <div class="btn changePwd">
        <p>Changer le mot de passe</p>
    </div>
    <?php if ($donnees['user_id'] != 1) { ?>
        <div class="btn deactivateAccount">
            <p>Supprimer le compte</p>
        </div>
    <?php } ?>
</div>
<div class="clear"></div>
<script>
    if (id != 1) {
        document.getElementsByClassName('deactivateAccount')[0].addEventListener("click", deactivate);
    }
    document.getElementsByClassName('changePwd')[0].addEventListener("click", changePassword);

    function changeData() {
        $('input').prop('disabled', false);
        $('.changeData').css('display', 'none');
        $('.changingData').css('display', 'block');
    }
    function cancel() {
        $('input').prop('disabled', true);
        $('.changeData').css('display', 'block');
        $('.changingData').css('display', 'none');
    }
    function changePassword() {
        window.location = 'chgPwd.php';
    }
    function deactivate() {
        if (confirm("Êtes-vous sûr de vouloir désactiver votre compte ?")) {
            $.post("../actions/activateUser.php", {state: '2', user_updating: <?php echo "{$donnees['user_id']}"; ?>});
            window.location = '../connexion/logout.php';
        }
    }
</script>
