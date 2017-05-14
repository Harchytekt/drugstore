<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil</title>
        <!-- css -->
        <link rel="stylesheet" href="style/style.css">

        <!-- js -->
        <script src="js/jquery-3.1.1.min.js"></script>

        <style media="screen">
            body {
                background-color: #B4BDA0;
                background-image: url('img/backgrounds/bg.jpg');
            }
        </style>
    </head>
    <body>
        <header>

            <nav>
                <div class="tab logIn">
                    <div class="navItem">
                        <a href="connexion/loginPage.php"><p>Connexion</p></a>
                    </div>
                </div><div class="tab list">
                    <div class="navItem">
                        <p>Liste des médicaments</p>
                    </div>
                </div><div class="tab signUp">
                    <div class="navItem">
                        <a href="connexion/signuPage.php"><p>Inscription</p></a>
                    </div>
                </div>
            </nav>

            <h1>Bienvenue sur votre pharmacie en ligne !</h1>
        </header>
        <main>
            <div id="presentation">
                <h3>Présentation</h3>
                <div class="insideText">
                    <p>
                        Ce site vous propose une liste, non exhaustive de
                        médicaments ainsi que leur dosage.<br>
                    </p>
                    <p>
                        En créant un compte sur le site, vous auez la possibilité
                        de créer une liste des médicaments qui vous intéressent.<br>
                        Vous aurez aussi accès à leur fiche contenant:
                    </p>
                    <ul>
                        <li>le nom et le dosage du médicament,</li>
                        <li>les contraindications générales,</li>
                        <li>une représentation,</li>
                        <li>un lien vers la notice complète.</li>
                    </ul>
                </div>
            </div>
        </main>
        <?php include_once 'include/footer.php'; ?>
        <script src="js/script.js"></script>
        <script>
            document.getElementsByClassName('list')[0].addEventListener("click", toList);

            /**
             * This function is used select the chosen table.
             */
            function toList() {
                window.location.href = 'insidePages/productList.php';
            }
        </script>
    </body>
</html>
