<?php 

require('inc/init.inc.php');

//afficher les films

$requete = $pdopierreblog->query("SELECT * FROM pierres_mineraux");

//3-Traitement de l'ajout d'article

if (!empty($_POST)) {


    $_POST['affiche'] = htmlspecialchars($_POST['espece']);
    $_POST['titre'] = htmlspecialchars($_POST['couleur']);
    $_POST['synopsis'] = htmlspecialchars($_POST['chakras']);
    $_POST['realisateur'] = htmlspecialchars($_POST['image']);
    $_POST['date_sortie'] = htmlspecialchars($_POST['contenu']);
   

    /*je  prepare ma requête avec des marquers vides,pour l'instant*/

    $insertion = $pdoDivertissements->prepare("INSERT INTO pierres_mineraux (espece, couleur, chakras, image, contenu) VALUES (:espece, :couleur, :chakras, :image, :contenu)");


    /* je fais correspondre mes marqueurs vides aux éléments de ma form */

    $insertion->execute( array(

        ':espece' => $_POST['espece'],
        ':couleur' => $_POST['couleur'],
        ':chaKras' => $_POST['chaKras'],
        ':image' => $_POST['image'],
        ':contenu' => $_POST['contenu'],

    ));
}
//j'initialise la variable contenu qui va servir pour les message de réussites ou d'erreur pour la suppression*/

$contenu =""; /*JE FAIS BIEN ATTENTION !!! il ne faut pas qu'il y est d'espace pour l'initialisation*/

// 5 -suppression d'un article

if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id'])){/* je fais mes vérifications pour la suppression dans l'URL du bouton supprimer */

   //je prepare  ma requête avec un marquer vide

$delete =$pdoDivertissements->prepare("DELETE FROM pierres_minéraux WHERE id = :id");// je fais correspondre le marqueur à l'élément recherché

$delete->execute(array(
'id'=> $_GET['id']

));

if($delete->rowCount() == 0){

    $contenu .='<div class="alert alert-danger"> Erreur de suppression du film n° '.$_GET['id'].'</div>';
}else{
    $contenu .= '<div class="alert alert-success"> le film n° '. $_GET['id'].'a bien été supprimé </div>';

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
        <?php echo require('inc/nav.inc.php'); ?>
    </header>

<section class="film row m-5">
<div><?php echo $contenu; ?></div>
    <h1>Toutes les pierres </h1>
<?php while($pierre = $requete->fetch(PDO::FETCH_ASSOC)) { ?> 
    <div class="card col-4">
        <img class="card-img-top img-fluid m-2" src="<?php echo $pierre['image'];?>" alt="illustration de film">
        <div class="card-body">
            <h4 class="card-title"><?php echo $pierre['id'];?></h4>
            <p class="card-text"><?php echo $pierre['espece'];?></p>
            <p class="card-text text-truncate"><?php echo $pierre['couleur'];?></p>
            <p class="card-text"><?php echo $pierre['chakras'];?></p>
          
        </div>
        <div class="btn-group">
                <a href="majfilm.php?id=<?php echo $pierre['id']; ?>" class="btn btn-primary">Modifier </a>
                <a href="films.php?action=suppression&id=<?php echo $pierre['id']; ?>" class="btn btn-danger" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer ?'))">Supprimer </a>
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

                        <button type="submit" class="btn btn-primary" name="submit">Ajouter un films</button>


    </form>

    

</section>



<footer class="mb-0">
    <?php echo require('inc/nav.inc.php'); ?>
</footer>
    
    
</body>
</html>