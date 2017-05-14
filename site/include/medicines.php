<?php
    if (!isset($current_id)) {
        $current_id = 0;
    }
    $reponse = $bd->prepare('SELECT name, medicine_id, dosage FROM Medicines ORDER BY name;');
    $reponse->execute();
?>

<section id="cslide-slides" class="cslide-slides-master clearfix">
    <div class="cslide-slides-container clearfix">
<?php
    $items = 0;
    while ($donnees = $reponse->fetch()) {
        if ($items % 5 == 0) {
            ?>
            <div class="cslide-slide">
                <div class="slide-content">
            <table>
                <tr class="first">
                    <?php if ($current_id == 1) { ?>
                        <th>ID du produit</th>
                        <th class="special">Nom</th>
                        <th>Dosage</th>
                        <th class="choose">Modifier</th>
                    <?php } else { ?>
                        <th class="special">Nom</th>
                        <th>Dosage</th>
                        <th class="choose">Ajouter</th>
                    <?php } ?>
                </tr>
                <?php
        }

        if ($current_id == 1) { ?>
            <tr class="<?php echo $donnees['medicine_id']; ?>">
                <td class="line">
                    <?php echo $donnees['medicine_id']; ?>
                </td>
                <td class="line">
                    <?php echo $donnees['name']; ?>
                </td>
                <td class="line">
                    <?php echo $donnees['dosage']; ?>
                </td>
                <td class="choose">
                    <div class="mod button" id="mod<?php echo $donnees['medicine_id']; ?>">
                        <p>Modifier</p>
                    </div>
                </td>
            </tr>
        <?php
        } else { ?>
            <tr class="<?php echo $donnees['medicine_id']; ?>">
                <td class="line">
                    <?php echo $donnees['name']; ?>
                </td>
                <td class="line">
                    <?php echo $donnees['dosage']; ?>
                </td>
                <td class="choose">
                    <div class="add button" id="add<?php echo $donnees['medicine_id']; ?>">
                        <p>Ajouter</p>
                    </div>
                </td>
            </tr>
            <?php
        }
        $items += 1;
        if ($items % 5 == 0) {
                ?> </table>
            </div>
        </div> <?php
        }
    }
    ?></div>
    <div class="cslide-prev-next clearfix">
        <span class="cslide-prev">Précédent</span>
        <span class="cslide-next">Suivant</span>
    </div>
</section>
<?php if ($current_id == 1) { ?>
    <div class="med button" id="med0">
        <p>Ajouter un médicament</p>
    </div>
<?php } ?>
