<?php
    $reponse = $bd->query('SELECT username, user_id, name, medicine_id, dosage
        FROM Medicines NATURAL JOIN Lists NATURAL JOIN Users WHERE user_id != 1 ORDER BY user_id, name;');
?>

<section id="cslide-slides" class="cslide-slides-master clearfix">
    <div class="cslide-slides-container clearfix">
<?php
    $items = 0;
    $i     = 0;
    $id    = 0;
    while ($donnees = $reponse->fetch()) {
        if ($items % 5 == 0) {
            ?>
            <div class="cslide-slide">
                <div class="slide-content">
                    <table>
                        <tr class="first">
                            <?php if ($current_id == 1) { ?>
                                <th class="special">Utilisateur (ID)</th>
                                <th class="special">Médicament (ID)</th>
                                <th>Dosage</th>
                            <?php } else { ?>
                                <th class="special">Nom</th>
                                <th>Dosage</th>
                                <th class="choose">Retirer</th>
                            <?php } ?>
                        </tr>
                        <?php
        }

        if ($current_id == 1) {
            if ($id == "${donnees['user_id']}") {
                $i++;
            } else {
                $id = "${donnees['user_id']}";
                $i = 0;
            }
            if ($i == 0) { ?>
                <tr id="reservesBar" class="<?php echo $donnees['medicine_id']; ?>"> <?php
            } else { ?> <tr class="<?php echo $donnees['medicine_id']; ?>">
                <?php
            } ?>
                <td class="line">
                    <?php echo $donnees['username']; ?>
                        (<?php echo $donnees['user_id']; ?>)
                </td>
                <td class="line">
                    <?php echo $donnees['name']; ?>
                        (<?php echo $donnees['medicine_id']; ?>)
                </td>
                <td class="line">
                    <?php echo $donnees['dosage']; ?>
                </td>
            </tr>
            <?php
            $items += 1;
        } else if ($donnees['user_id'] == $current_id) { ?>
            <tr class="<?php echo $donnees['medicine_id']; ?>">
                <td class="line">
                    <?php echo $donnees['name']; ?>
                </td>
                <td class="line">
                    <?php echo $donnees['dosage']; ?>
                </td>
                <td class="choose">
                    <div class="rem button" id="rem<?php echo $donnees['medicine_id']; ?>">
                        <p>Retirer</p>
                    </div>
                </td>
            </tr>
            <?php
            $items += 1;
        }
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
