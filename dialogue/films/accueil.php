<?php 

require('inc/init.inc.php');

//afficher les films

$requete = $pdoDivertissements->query("SELECT * FROM films ORDER BY date_sortie DESC LIMIT 0,3");

//afficher les series

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

    <h1>Les trois derniers films : </h1>
<?php while($film = $requete->fetch(PDO::FETCH_ASSOC)) { ?> 
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
    <?php }?>

    

</section>

<section class="serie row m-5 mt-3">

<h2>Les trois dernière séries : </h2>
<?php 

$requete = $pdoDivertissements->query("SELECT * FROM series ORDER BY date_debut DESC LIMIT 0,3");


while($serie = $requete->fetch(PDO::FETCH_ASSOC)) { 
    
    
    
    ?> 
    <div class="card col-4 mt-2">
        <img class="card-img-top img-fluid" src="<?php echo $serie['affiche'];?>" alt="illustration de serie">
        <div class="card-body">
            <h4 class="card-title">ID : <?php echo $serie['id'];?></h4>
            <p class="card-text">TITRE : <?php echo $serie['titre_serie'];?></p>
            <p class="card-text text-truncate">SYNOPSIS : <?php echo $serie['synopsis'];?></p>
            <p class="card-text">NOMBRE DE SAISONS : <?php echo $serie['nbr_saisons'];?></p>
            <p class="card-text">DATE: <?php echo date('d-m-Y' , strtotime($serie['date_debut'] . ' ' . $serie['date_fin']));?></p>
            <p class="card-text">REALISATEUR : <?php echo $serie['realisateur'];?></p>
            <p class="card-text">GENRE : <?php echo $serie['genre'];?></p>
            <p class="card-text">CLASSIFICATION LEGAL : <?php echo $serie['classification'];?></p>
        </div>
    </div>
    <?php }?>
  

</section>

<footer class="mb-0">
    <?php echo require('inc/nav.inc.php'); ?>
</footer>
    
    
</body>
</html>