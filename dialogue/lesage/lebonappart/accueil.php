<?php

// connexion BDD et debug
require('inc/init.inc.php');

require('inc/functions.php');


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

    <div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100 img-fluid" src="img/maison01.jpg" alt="photo de maison">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100 img-fluid" src="img/maison02.jpg" alt="Sphoto de maison">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100 img-fluid" src="img/maison03.jpg" alt="photo de maison">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
           
        </a>
</div>

    </div>

    </header>
<!--    fin header  -->
    <main>
    
        <div class="bg-white mt-2 mb-2 m-auto p-3">
            <section class="row">
                <div class="col-12">
                    <h2>Les dernieres annonces</h2>

                    <?php
                    // afficher 
                    $requete = $pdoWf3_php_intermediaire_severine->query("SELECT * FROM advert ORDER BY id DESC LIMIT 0,15");
                    ?>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Code postal</th>
                                <th>Ville</th>
                                <th>Type</th>
                                <th>Prix</th>
                                 
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?><!-- ouverture de la boucle while -->
                                <tr>
                                    <td><?php echo $ligne['id']; ?></td>
                                    <td class="text-uppercase"><?php echo $ligne['title']; ?></td>
                                    <td><?php echo $ligne['description']; ?></td>
                                    <td><?php echo $ligne['postal_code']; ?></td>
                                    <td><?php echo $ligne['city']; ?></td>
                                    <td><?php echo $ligne['type']; ?></td>
                                    <td><?php echo $ligne['price']; ?></td>
                                   
                                </tr>
                            <?php } ?><!-- fermeture de la boucle -->
                        </tbody>
                    </table>

                </div><!-- fin col -->
                
              
            </section><!-- fin row -->
            
        </div>
        <!-- fin container  -->

      
    </main>

    <footer>
        <p class="text-center">PIED DE PAGE</p>
    </footer>

    
</body>

</html>