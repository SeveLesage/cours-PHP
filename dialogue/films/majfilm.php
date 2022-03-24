<?php
// j'inclus le fichier inc à la darre de données

require('../films/inc/init.inc.php');


// reception des infos des articles selectionner grace aux infos recuperer dans l'URL avec $_GET

if(isset($_GET['id'])) {
    $article = $pdoDivertissements->prepare("SELECT * FROM films WHERE id= :id");
    $article->execute(array(
        ':id' => $_GET['id'], //j'associe le marqueur vide à l'id de l'article
    ));

    if($article->rowCount() == 0){ // si le code renvoie un id inconnu
        header('location:films.php');
        exit();
    }
    $resultat = $article->fetch(PDO::FETCH_ASSOC);
} else {
    header('location:films.php');
    exit();
}


//mise à jour d'un article

if (!empty($_POST)) {
    $_POST['affiche'] = htmlspecialchars($_POST['affiche']);
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['synopsis'] = htmlspecialchars($_POST['synopsis']);
    $_POST['realisateur'] = htmlspecialchars($_POST['realisateur']);
    $_POST['date_sortie'] = htmlspecialchars($_POST['date_sortie']);
    $_POST['genre'] = htmlspecialchars($_POST['genre']);
    $_POST['classification'] = htmlspecialchars($_POST['classification']);

    $resultats = $pdoDivertissements->prepare("UPDATE films SET affiche = :affiche, titre = :titre, synopsis = :synopsis, realisateur = :realisateur, date_sortie = :date_sortie, genre = :genre, classification = :classification WHERE id = :id");

    $resultats->execute(array(

        ':affiche' => $_POST['affiche'],
        ':titre' => $_POST['titre'],
        ':synopsis' => $_POST['synopsis'],
        ':realisateur' => $_POST['realisateur'],
        ':sortie_sortie' => $_POST['sortie_sortie'],
        ':genre' => $_POST['genre'],
        ':classification' => $_POST['classification'],
        ':id' => $_GET['id'],

    ));

    header('location:films.php');
    exit();
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page des articles</title>
    <!-- BOOTSwatch -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="p-5 bg-light">
        <div class="container">
        <section class="film row m-5">


    <h1>Listes des films : </h1>
   <!--  <?php while($film = $requete->fetch(PDO::FETCH_ASSOC)) { ?>  -->
    <div class="card col-4">
        <img class="card-img-top img-fluid m-2" src="<?php echo $film['affiche'];?>" alt="illustration de film">
        <div class="card-body">
            <h4 class="card-title">ID : <?php echo $film['id'];?></h4>
            <p class="card-text">TITRE : <?php echo $film['titre'];?></p>
            <p class="card-text text-truncate">SYNOPSIS : <?php echo $film['synopsis'];?></p>
            <p class="card-text">REALISATEUR : <?php echo $film['realisateur'];?></p>
            <p class="card-text">DATE DE SORTIE : <?php echo date('d-m-Y' , strtotime($film['date_sortie']));?></p>
            <p class="card-text">GENRE : <?php echo $film['genre'];?></p>
            <p class="card-text">CLASSIFICATION LEGAL : <?php echo $film['classification'];?></p>
        </div>
        
    </div>
    <!-- <?php }?> -->

        </div>
    </div>



    <div class="container">

        <div class="row">

            <div class="col-12">
                <div class="col-8 mx-auto">
                    <img src="<?php echo $resultat['image'] ?>" alt="illustration article" class="img-fluid">
                    <?php echo $resultat['contenu']?>
                </div>

                <div class="col-8 mx-auto">
                    <h2 class="text-center">Mise à jour du films</h2>

                    <form action="#" method="POST" >
                        <!-- lorsque l'on fait une formulaire de mise  à jour il faut penser à passer en value les données deja presents dans la BDD pour voir ce que l'on veut modifier
                      -->

                      <div class="mb-3">
                            <label for="affiche">Affiche :</label>
                            <input type="text" name="affiche" id="affiche" class="form-control" required>

                        </div>

                        <div class="mb-3">
                            <label for="titre">Titre :</label>
                            <input type="text" name="titre" id="titre" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="synopsis">Synopsis :</label>
                            <input type="text" name="synopsis" id="synopsis" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="realisateur">Réalisateur :</label>
                            <input type="text" name="realisateur" id="realisateur" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_sortie">Date de sortie :</label>
                            <input type="date" name="date_sortie" id="date_sortie" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="genre">Genre :</label>
                            <select name="genre" id="genre">
                                <option value="action">action</option>
                                <option value="aventure">aventure</option>
                                <option value="comedie">comédie</option>
                                <option value="comedie_dramatique">comedie dramatique</option>
                                <option value="drame">drame</option>
                                <option value="fantastique">fantastique</option>
                                <option value="guerre">guerre</option>
                                <option value="policier">policier</option>
                                <option value="horreur">horreur</option>
                                <option value="romantique">romantique</option>
                                <option value="western">western</option>
                                <option value="science_fiction">science-fiction</option>
                                <option value="documentaire">documentaire</option>
                                <option value="biopic">biopic</option>
                                <option value="dessin_anime">dessin animé</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="classification">classification :</label>
                            <select name="classification" id="classification">
                                <option value="tous_publics">Tous publics</option>
                                <option value="publics_averti">Publics averti</option>
                                <option value="12">12</option>
                                <option value="16">16</option>
                                <option value="18">18</option>
                                <option value="accord_parental">accord parental</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Mise à jour du films</button>


                    </form>
                </div>
            
                <!-- J'affiche toutes les informations relatives à l'employé sélectionné -->
                
               
                </div>

           
              


            </div>

          


        </div>





    </div>














    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>