<?php

// connexion BDD et debug
require('inc/init.inc.php');

require('inc/functions.php');

// afficher 
$requete = $pdoWf3_php_intermediaire_severine->query("SELECT * FROM advert");
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- BOOTSwatch -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Le bon appart : Accueil</title>

</head>

<body>
    <!-- 3-Ma nav en require_once -->
    <header>

    <?php require_once('inc/menu.inc.php'); ?>

    </header>
<!--    fin header  -->
    <main>
    
    <div class="bg-white mt-2 mb-2 m-auto p-3">
        <h2>Toutes les annonces</h2>
            <section class="row">
            
                  <?php
                     while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {//!-- ouverture de la boucle while -->
                    ?>

                    <div class="card col-4">
                        <div class="card-body">
                            <p class="card-text">Id : <?php echo $ligne['id']; ?></p>
                            <h4 class="card-title">Titre : <?php echo $ligne['title']; ?></h4>
                            <p class="card-text">Description <?php echo $ligne['description']; ?></p>
                            <p class="card-text">Code postal : <?php echo $ligne['postal_code']; ?></p>
                            <p class="card-text">Ville : <?php echo $ligne['city']; ?></p>
                            <p class="card-text">Type : <?php echo $ligne['type']; ?></p>
                            <p class="card-text">Prix : <?php echo $ligne['price']; ?></p>
                            <div>
                                <button class="btn btn-dark"><a href="consulter.php?id=<?php echo $ligne['id']; ?>" class="text-white text-decoration-none">Voir l'annonce</a></button>
                            </div>
                        </div>
                    </div>

                    <?php } ?><!-- fermeture de la boucle -->

            </section><!-- fin row -->
            
        </div>
    </main>

    <footer>
        <p class="text-center">PIED DE PAGE</p>
    </footer>
    
</body>

</html>