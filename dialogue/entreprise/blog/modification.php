<?php
// 1-Méthodes de debug
require('inc/functions.php');

// 2- Connexion BDD
$pdoBlog = new PDO(
    'mysql:host=localhost;dbname=blog',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // afficher les erreurs SQL dans le navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // charset des échanges avec la BDD
    )
);

// 3- Réception des infos d'un employé avec $_GET
if (isset($_GET['id'])) {//isset est qu'il est defini(existe)
    $resultat = $pdoBlog->prepare(" SELECT * FROM articles WHERE id = :id ");
    //-> on se base sur / on s'appuie sur
    //=> element a gauche correspond a l'element a droite
    $resultat->execute(array(
        ':id' => $_GET['id'] // on associe le marqueur vide à l'id_employes
    ));

    $fiche = $resultat->fetch(PDO::FETCH_ASSOC);
    if ($resultat->rowCount() == 0) {// si la personne est venue sur la page e n recuperant un id_employes qui n'existe pas => renvoyée sur la page02
        header('location:modification.php');
        exit();
        //FECH_ASSOC permet de renvoyer les resultat d'une rangée comme venant d'un tableau
    } 
} else { // si la personne vient sur la page juste  03-entreprise.php on la renvoie vers la page 02-entreprise.php
    header('location:blog.php');// doit etre à l'exterieur du if principale car on demande de sortir si on ne recupere pas l'id_employes dans l'URL
    exit();
}

//4- MàJ d'un employé
if (!empty($_POST)) {
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['contenu'] = htmlspecialchars($_POST['contenu']);
    $_POST['auteur'] = htmlspecialchars($_POST['auteur']);
    $_POST['date_parution'] = htmlspecialchars($_POST['date_parution']);

    $resultat = $pdoBlog->prepare(" UPDATE articles SET image = :image, titre= :titre, contenu = :contenu, auteur = :auteur, date_parution = :date_parution WHERE id = :id ");
    /* On utilise prepare lorsque l'on prépare une requête avec des marqueurs (:nomduchamp) */

    $resultat->execute(array(
        ':image' => $_POST['image'],
        ':titre' => $_POST['titre'],
        ':contenu' => $_POST['contenu'],
        ':auteur' => $_POST['auteur'],
        ':date_parution' => $_POST['date_parution'],
    ));
    /* Je fais ensuite correspondre les marqueurs jusqu'à là vides aux donnéees que je récupère de mon formulaire */

    header('location:modification.php');
    exit();
}

?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Back Office Entreprise - MàJ d'un employé</title>

</head>

<body>
<?php require_once('inc/nav.inc.php'); ?>
    <main>
        <div class="p-5 bg-light">
            <div class="container">
                <h1 class="display-3">Back Office Entreprise</h1>
                <p class="lead">Page employés</p>
            </div>
        </div>
        <!-- fin container-fluid header  -->
        <div class="container bg-white mt-2 mb-2 m-auto p-2">

            <!-- J'afficherai ici ce qui se trouve dans le contenu pour la suppression d'un élément -->
        <!--     <?php
            echo $contenu;
            ?> -->


    
     
        <div class="album py-5 bg-light">
        <div class="card">
                    <div class="card-header">
                        <h4 class="text-center"><?php echo $fiche['id']; ?></h4><!-- affiche le prenom et le nom -->
                    </div>
                    <div class="card-body">
                        <img src="<?php echo $ligne['image']; ?>" alt="photo">
                        <p class="card-text">Titre : <?php echo $fiche['titre'] ?></p> <!-- affiche le service ou la profession de  l'employé -->
                        <p class="card-text">Contenu : <?php echo $fiche['contenu'] ?></p>
                        <p class="card-text">Auteur : <?php echo $fiche['auteur'] ?></p>
                        <p class="card-text">Date de parution :
                            <?php
                            echo date('d/m/Y', strtotime($fiche['date_parution']))
                            ?><!-- affiche la date en français  -->
                        </p>
                    </div>
                </div>
 
            <!-- fin col -->

            <div class="col-12">
                    <h2 class="text-center mb-4">Modification de l'article</h2>

                    <form action="#" method="POST" class="border bg-light p-2 rounded mx-auto">

                        <div class="mb-3">
                            <label for="file">Image</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div><!-- image -->

                        <div class="mb-3">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" id="titre" class="form-control" required>
                        </div><!-- titre -->
                        
                        <div class="mb-3">
                            <label for="text">Contenu</label> <br>
                            <input type="text" name="text" id="text" required>

                        </div><!-- contenu -->

                        <div class="mb-3">
                            <label for="service">Auteur</label>
                            <input type="auteur" name="auteur" id="auteur" required>
                            
                        </div><!-- auteur -->

                        <div class="mb-3">
                            <label for="date_parution" class="form-label">Date d'embauche</label>
                            <input type="date" name="date_parution" id="date_parution" class="form-control" required>
                        </div><!-- DATE parution-->

                        

                        <button type="submit" class="btn btn-success" name="submit" id="submit">Modifier l'article</button><!-- BOUTON SUBMIT -->

                    </form>
                </div>
            <!-- fin col -->
        </section>
        <!-- fin row -->
        </div>
        <!-- fin container  -->
    </main>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>