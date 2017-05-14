/**
 * Cette partie est lancée automatiquement au lancement du script.
 */
$(document).ready(function() {
    updateFooterBg();
    hideUsers();
});


/**
 * Cette fonction cache l'onglet 'Utilisateurs'
 * lorsqu'un utilisateur autre que l'administrateur
 * est connecté.
 */
function hideUsers() {
    if (id != 1) {
        document.getElementsByClassName('tab users')[0].style.display = "none";
    }
}

/**
 * Cette fonction est utilisée pour sélectionner
 * l'onglet courant.
 */
function setCurrentTab(newTab) {
    $('#current').attr('id', '');
    $('.tab.'+newTab+'.tabTables').attr('id', 'current');
}

/**
 * Ce bloc permet de mettre un effet de flou sur le footer
 * lorsque le navigateur est Safari.
 * Dans tous les autres cas, le footer possède un fond coloré.
 */

var ua = navigator.userAgent.toLowerCase();
function updateFooterBg() {
    if (ua.indexOf('safari') == -1 || ua.indexOf('chrome') > -1) {
        $('footer').css('background-color', '#FCF1DB');
        $('footer').css('background-color', 'rgba(255, 241, 215, 0.7)');
        $('nav .navItem').css('background-color', '#FCF1DB');
        $('nav .navItem').css('background-color', 'rgba(255, 241, 215, 0.7)');
    }
}
