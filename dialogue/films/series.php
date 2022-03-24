<?php 

require('inc/init.inc.php');

//afficher les series

$requete = $pdoDivertissements->query("SELECT * FROM series");

//3-Traitement de l'ajout d'article

if (!empty($_POST)) {


    $_POST['affiche'] = htmlspecialchars($_POST['affiche']);
  /*   $_POST['titre_serie'] = htmlspecialchars($_POST['titre_serie']); */
    $_POST['synopsis'] = htmlspecialchars($_POST['synopsis']);
    $_POST['realisateur'] = htmlspecialchars($_POST['realisateur']);
    $_POST['nbr_saisons'] = htmlspecialchars($_POST['nbr_saisons']);
    $_POST['date_debut'] = htmlspecialchars($_POST['date_debut']);
    $_POST['date_fin'] = htmlspecialchars($_POST['date_fin']);
    $_POST['genre'] = htmlspecialchars($_POST['genre']);
    $_POST['classification'] = htmlspecialchars($_POST['classification']);

    /*je  prepare ma requête avec des marquers vides,pour l'instant*/

    $insertion = $pdoDivertissements->prepare("INSERT INTO series (affiche, synopsis, realisateur, nbr_saisons, date_debut, date_fin, genre, classification) VALUES (:affiche, :synopsis, :realisateur, :nbr_saisons, :date_debut, :date_fin, :genre, :classification)");


    /* je fais correspondre mes marqueurs vides aux éléments de ma form */

    $insertion->execute(array(

        ':affiche' => $_POST['affiche'],
       /*  ':titre_serie' => $_POST['titre_serie'], */
        ':synopsis' => $_POST['synopsis'],
        ':realisateur' => $_POST['realisateur'],
        ':nbr_saisons' => $_POST['nbr_saisons'],
        ':date_debut' => $_POST['date_debut'],
        ':date_fin' => $_POST['date_fin'],
        ':genre' => $_POST['genre'],
       /*  ':classification' => $_POST['classification'], */



    ));
}
//j'initialise la variable contenu qui va servir pour les message de réussites ou d'erreur pour la suppression*/

$contenu =""; /*JE FAIS BIEN ATTENTION !!! il ne faut pas qu'il y est d'espace pour l'initialisation*/

// 5 -suppression d'un article

if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id'])){/* je fais mes vérifications pour la suppression dans l'URL du bouton supprimer */

   //je prepare  ma requête avec un marquer vide

$delete =$pdoDivertissements->prepare("DELETE FROM series WHERE id = :id");// je fais correspondre le marqueur à l'élément recherché

$delete->execute(array(
'id'=> $_GET['id']

));

if($delete->rowCount() == 0){

    $contenu .='<div class="alert alert-danger"> Erreur de suppression du la series n° '.$_GET['id'].'</div>';
}else{
    $contenu .= '<div class="alert alert-success"> la series n° '. $_GET['id'].'a bien été supprimé </div>';


}
}




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

     <!-- Boostrap lux cdnjs -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <header>
        <?php echo require('inc/nav.inc.php'); 
        
        ?>

    </header>

<section class="film row m-5">
<div><?php echo $contenu; ?></div>
    <h1>Listes des séries : </h1>
<?php while($series = $requete->fetch(PDO::FETCH_ASSOC)) { ?> 
    <div class="card col-4">
        <img class="card-img-top img-fluid m-2" src="<?php echo $series['affiche'];?>" alt="illustration series">
        <div class="card-body">
            <h4 class="card-title">ID : <?php echo $series['id'];?></h4>
            <p class="card-text">TITRE : <?php echo $series['titre_serie'];?></p>
            <p class="card-text text-truncate">SYNOPSIS : <?php echo $series['synopsis'];?></p>
            <p class="card-text">REALISATEUR : <?php echo $series['realisateur'];?></p>
            <p class="card-text">NOMBRE DE SAISONS : <?php echo $series['nbr_saisons'];?></p>
            <p class="card-text">DATE DE DEBUT : <?php echo date('d-m-Y' , strtotime($series['date_debut']));?></p>
            <p class="card-text">DATE DE FIN : <?php echo date('d-m-Y' , strtotime($series['date_fin']));?></p>
            <p class="card-text">GENRE : <?php echo $series['genre'];?></p>
            <p class="card-text">CLASSIFICATION LEGAL : <?php echo $series['classification'];?></p>
        </div>
        <div class="btn-group">
                <a href="majserie.php?id=<?php echo $series['id']; ?>" class="btn btn-primary">Modifier </a>
                <a href="series.php?action=suppression&id=<?php echo $series['id']; ?>" class="btn btn-danger" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer ce film?'))">Supprimer </a>
        </div>
    </div>
    <?php }?>

    

</section>

<section class="m-5">
    <form action="#" method="POST">
         <div class="mb-3">
                            <label for="affiche">Affiche :</label>
                            <input type="text" name="affiche" id="affiche" class="form-control" required>

                        </div>

                        <div class="mb-3">
                            <label for="titre_serie">Titre :</label>
                            <input type="text" name="titre_serie" id="titre_serie" class="form-control" required>
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
                            <label for="nbr_saisons">Nombre de saisons :</label>
                            <input type="text" name="nbr_saisons" id="nbr_saisons" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_debut">Date de debut :</label>
                            <input type="date" name="date_debut" id="date_debut" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_fin">Date de fin :</label>
                            <input type="date" name="date_fin" id="date_fin" class="form-control" required>
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

                        <button type="submit" class="btn btn-primary" name="submit">Ajouter une serie</button>


    </form>

    

</section>



<footer class="mb-0">
    <?php echo require('inc/nav.inc.php'); ?>
</footer>
    
    
</body>
</html>