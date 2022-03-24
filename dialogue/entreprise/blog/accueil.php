<?php
// 1- Méthodes de debug
require('inc/functions.php');

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

?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Articles les plus récents</title>

</head>

<body>
    <!-- 3-Ma nav en require_once -->
    <?php require_once('inc/nav.inc.php'); ?>
    <main>
        <div class="p-5 bg-light">
            <div class="container">
                <h1 class="display-3">Les articles, les plus récents</h1>
                <p class="lead">Page d'accueil</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="blog.php" role="button">Les articles</a>
                </p>
            </div>
        </div><!-- fin header -->
        <?php
                    // 4- J'affiche un tableau avec les personnes travaillant à la direction, du salaire le plus élevé au salaire le plus bas
     $requete = $pdoBlog->query(" SELECT * FROM articles ORDER BY date_parution LIMIT 3");
    ?>

    <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="album py-5 bg-light">
    <div class="container">
    
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col-12">
          <div class="card shadow-sm">
          <img src="<?php echo $ligne['image']; ?>" alt="photo" width="230" height="250">

            <div class="card-body">
           <small class="text-muted">Id : <?php echo $ligne['id']; ?></small>
           <p class="card-text"><?php echo $ligne['titre'];?> <br></p>
              <p class="card-text"><?php echo $ligne['contenu']; ?> <br></p> 
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted"><?php echo $ligne['auteur']; ?></small>
                <small class="text-muted"><?php echo date('d-m-Y', strtotime($ligne['date_parution'])); ?></small>
              </div>
            </div>
          </div>
        </div>
       
  </div>
  <?php } ?>
  
    
    </main>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>