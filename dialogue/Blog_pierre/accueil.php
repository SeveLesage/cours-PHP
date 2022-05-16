<?php 
// j'inclu require ma connection a ma base de donnée
require('inc/init.inc.php');
//je fais ma requête pour afficher un tableau avec les cinq article les plus recente
$requete = $pdopierreblog->query("SELECT * FROM pierres_mineraux ORDER BY id LIMIT 0,4");
//Grâce aux valeurs precisées apres le limit de preciser d'abord que je veux commencer au premier elements du tableau et je precise en suite que je veux limiter à 5 éléments
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

    <!-- lien css -->
    <link rel="stylesheet" href="css/style.css">
  
    <!-- Boostrap lux cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!-- cdn icone boost -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
<div class="container w-75">
<?php require('inc/nav.inc.php');?>



<section class="fbleu">
    <div class="jumbotron">
        <h1 class="display-3 fs-2 text-white">Blog sur les pierres et le minéraux</h1>
        <p class="lead">Page d'accueil</p>
    </div>
    </section>

    <section>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/agata01.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/fluorite.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/rock-crystal.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
<div class="container mt-4">
    <section class="container">
        <h2 class="text-center">Les pierres actuel</h2>
    </section>
    <section class="row">
    <?php 
             while($pierre = $requete->fetch(PDO::FETCH_ASSOC)) { ?> <!-- Ouverture d'une boucle while // ce n'est pas parce que je suis plus dans un passage PHP que ma boucle ne continu pas // tant que je n'est pas mis l'accolade fermante la boucle continu -->
     
       <div class="card col-lg-3 col-sm-12">
            <img class="card-img-top img-fluid" src="<?php echo $pierre['image']; ?>" alt="illustration pierre">
            <div class="card-body">
                <h4 class="card-title"><?php echo $pierre['espece']; ?></h4>
                <p class="card-text"><?php echo $pierre['couleur']; ?></p>
                <p class="card-text"><?php echo $pierre['chakras']; ?></p>
                <p class="card-text"><?php echo $pierre['contenu']; ?></p>
            </div>
        </div>
        
       
        <?php }?>
        </section>
        </div>

        <footer class="mt-5">
            <p>&copy;2022 Pierres & Minéraux</p>
        </footer>
            </div>
           
       
</body>
</html>