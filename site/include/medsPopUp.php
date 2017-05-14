<?php
    session_start();

    if (!empty($_POST['med_id'])) {
        $_SESSION['med_id'] = htmlentities(addslashes($_POST['med_id']));
    }
    if (!empty($_SESSION['med_id'])) {
        $med_id = $_SESSION['med_id'];
    }

    include '../connexion/connexion.php';

    $str = "SELECT name, medicine_id, dosage, contraindications, noticeLink FROM Medicines WHERE medicine_id <=> $med_id;";
    $reponse = $bd->query($str);
    $donnees = $reponse->fetch();
?>

<div id="close">
    <img src="../img/close.svg" height="32" width="32" class="clickableImg">
</div>
<img src="../img/meds/<?php Print($med_id); ?>.png" alt="" id="med" height="128" width="128">
<h2 id="medName"><?php Print($donnees['name']); ?> <span id="dose">(<?php Print($donnees['dosage']); ?>)</span></h2>
<div id="contraindicationsList"><?php Print($donnees['contraindications']); ?></div>
<a href="<?php Print($donnees['noticeLink']); ?>">
    <img src="../img/info.svg" height="50" width="50" class="clickableImg" title="Télécharger la notice">
</a>
<script>
    $('#close').click(function() {
        $("#popup").css("display", "none");
    });
</script>

<?php
    $reponse->closeCursor(); // Termine le traitement de la requête
    $bd = null;
?>
