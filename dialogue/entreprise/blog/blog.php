<?php
// 1- Méthodes de debug
//require('inc/functions.php');

// 2- Connexion à la BDD
$pdoBlog = new PDO(
    'mysql:host=localhost;dbname=blog',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);

// 3- Vérification du formulaire d'insertion
if (!empty($_POST)) {/* SI le formulaire n'est pas vide, j'exécute ce qui suit */
    /* Je m'assure que je n'ai pas d'insertion de SQL et de failles */
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['contenu'] = htmlspecialchars($_POST['contenu']);
    $_POST['auteur'] = htmlspecialchars($_POST['auteur']);
    $_POST['date_parution'] = htmlspecialchars($_POST['date_parution']);
    

    /* Je prépare ma requête avec des marqueurs pour l'instant vides */
    $insertion = $pdoBlog->prepare(" INSERT INTO articles (image, titre, contenu, auteur, date_parution) VALUES (:image, :titre, :contenu, :auteur, :date_parution) ");

    $insertion->execute(array(
        ':image' => $_POST['image'],
        ':titre' => $_POST['titre'],
        ':contenu' => $_POST['contenu'],
        ':auteur' => $_POST['auteur'],
        ':date_parution' => $_POST['date_parution'],
        /* Mes marqueurs sont maintenant remplis avec les données récupérées grâce au name dans le formulaire */
    ));
}

// 4- J'initialise ma variable $contenu qui va me servir par la suite
$contenu = "";

// 5- Suppression d'un élément
// jevar_dump($_GET);/* Vérification de ce que je récupère dans le get */
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id'])) {
    // si l'indice "action" existe dans $_GET et que sa valeur est "suppression" et que l'indice "id_employes" existe  aussi, alors je peux traiter la suppression de l'employé demandé // Voir lien sur le bouton suppression

    $resultat = $pdoBlog->prepare(" DELETE FROM articles WHERE id = :id ");/* Je prépare ma requête avec un marqueur vide */

    $resultat->execute(array(
        ':id' => $_GET['id']
    ));/* Je signifie que le marqueur vide(:id_employes) correspond à l'id_employes récupéré */

    if ($resultat->rowCount() == 0) {
        $contenu .= '<div class="alert alert-danger">Erreur de suppression de l\'article n° ' . $_GET['id'] . ' </div>';/* .=(concatener et ajouter) si ça n'a pas fonctionné j'affiche ça */
    } else {
        $contenu .= '<div class="alert alert-success">L\'article n° ' . $_GET['id'] . ' a bien été supprimé </div>';/* sinon j'affiche ça */
    }/* ici je me sers de ma variable contenu qui était vide mais dans laquelle j'injecte désormais du contenu */
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

    <title>Backoffice entreprise - Employés</title>

    <style>
    

    </style>

</head>

<body>
    <!-- 6- Ma nav en require_once -->
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
            <?php
            echo $contenu;
            ?>


    
        <?php
                    // 4- J'affiche un tableau avec les personnes travaillant à la direction, du salaire le plus élevé au salaire le plus bas
     $requete = $pdoBlog->query(" SELECT * FROM articles");
    ?>

    <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="album py-5 bg-light">
    <div class="container">
    
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col-12">
          <div class="card shadow-sm">
          <img src="<?php echo $ligne['image']; ?>" alt="photo" class="img-fluid">

            <div class="card-body">
           <small class="text-muted">Id : <?php echo $ligne['id']; ?></small>
           <p class="card-text"><?php echo $ligne['titre'];?> <br></p>
              <p class="card-text"><?php echo $ligne['contenu']; ?> <br></p> 
              <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                  <button type="button"><a href="modification.php?id=<?php echo $ligne['id']; ?>" class="btn btn-success">Modifier</a></button> 
                  <button type="button"> <a href="blog.php?action=suppression&id=<?php echo $ligne['id']; ?>" class="btn btn-danger" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cette articles ?'))">Supprimer</a></button> 
                </div>
                <small class="text-muted"><?php echo $ligne['auteur']; ?></small>
                <small class="text-muted"><?php echo date('d-m-Y', strtotime($ligne['date_parution'])); ?></small>
              </div>
            </div>
          </div>
        </div>
       
  </div>
  <?php } ?>


                <div class="col-12">
                    <h2 class="text-center mb-4">Ajout un article</h2>

                    <form action="#" method="POST" class="border bg-light p-2 rounded mx-auto" enctype="multipart/form-data">

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

                        

                        <button type="submit" class="btn btn-success" name="submit" id="submit">Ajouter l'article</button><!-- BOUTON SUBMIT -->

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