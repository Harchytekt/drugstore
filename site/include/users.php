<?php
    $reponse = $bd->query('SELECT username, user_id, password, mail, active FROM Users ORDER BY user_id;');
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
                                <th class="special">Id de l'utilisateur</th>
                                <th>Nom d'utilisateur</th>
                                <th>Adresse mail</th>
                                <th>État</th>
                                <th>Désactiver</th>
                                <th>Mot de passe</th>
                        </tr><?php
        } ?>
        <tr>
            <td>
                <?php echo $donnees['user_id']; ?>
            </td>
            <td>
                <div class="updateData" id="upd<?php echo $donnees['user_id']; ?>" title="Modifier les données">
                    <?php echo $donnees['username']; ?>
                </div>
            </td>
            <td>
                <?php
                    if ($donnees['user_id'] == 1) {
                        echo $donnees['mail'];
                    } else {
                        ?>
                        <div class="sendmail" id="mid<?php echo $donnees['mail']; ?>" title="Adresser un mail">
                            <?php echo $donnees['mail']; ?>
                        </div>
                        <?php
                    }
                ?>
            </td>
            <td>
                <?php
                    if ($donnees['user_id'] == 1) {
                        echo "Administrateur";
                    } else {
                        if ($donnees['active'] == 1) {
                            echo "Activé";
                        } else {
                            echo "Désactivé";
                        }
                    }
                ?>
            </td>
            <?php
                if ($donnees['user_id'] != 1) {
                    ?>
                    <td class="choose">
                        <?php if ($donnees['active'] == 1) { ?>
                            <div class="des button" id="des<?php echo $donnees['user_id']; ?>">
                                <p>Désactiver</p>
                            </div>
                        <?php } else { ?>
                            <div class="act button" id="act<?php echo $donnees['user_id']; ?>">
                                <p>Activer</p>
                            </div>
                        <?php } ?>
                    </td>
                    <td>
                        <div class="rei button" id="rei<?php echo $donnees['user_id']; ?>">
                            <p>Réinitialiser</p>
                        </div>
                    </td>
                    <?php
                }
            ?>
        </tr>
        <?php
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
