<?php
    session_start();

    if (!empty($_POST['updateID'])) {
        $_SESSION['updateID'] = htmlentities(addslashes($_POST['updateID']));
    }
    include '../connexion/connexion.php';
    $uid      = $_SESSION['updateID'];
    $reponse  = $bd->query("SELECT * FROM Users WHERE user_id = $uid;");
    $donnees  = $reponse->fetch();
    $username = $donnees['username'];
?>

<div id="close">
    <img src="../img/close.svg" height="32" width="32" class="clickableImg">
</div>

<?php
    include('../forms/updateDataForm.php');
?>
<script>
    $('#close').click(function() {
        $("#popup").css("display", "none");
    });
</script>
