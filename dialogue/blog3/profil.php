<?php 
// 1- Require de init.inc.php
require_once('inc/init.inc.php');

//verification de connexion
if (!estConnecte()) {//si la personne ne remplis pas les condition de la function estConnecte() alors on va la renvoyer vers la page connexion.php
    header('location:connexion.php');
}

//deconnexion

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {//si dans l'url je recupere action = deconnexion
    unset($_SESSION['membres']);
    $contenu .= "<div class=\"alert alert-danger\">Vous avez bien ete deconnecte</div>";
}




?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil personnel</title>
    <!-- BOOTSWATCH CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- cdn icone boost -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>

    <?php if (!estConnecte()) {
        echo "<div class=\"alert alert-success\">Vous n'etes pas connecté, merci de bien vouloir sur la page <a href=\"connexion.php\">connexion</a> pour accéder à votre profil.</div>";
    
    } else {?>

    <div class="p-5 bg-primary">
        <div class="container">
            <h1 class="display-3 text-white">Profil de <?php echo $_SESSION['membres']['prenom'] . ' ' . $_SESSION['membres']['nom'];?></h1>
            <!-- a partir du moment ou un memebre est connecte ses infos sont passees dans la superglobal $_SESSION et on peut donc y acceder à n'importe quel moment et endroit du site -->
            <p class="lead text-white">Bienvenue sur votre profil
                <?php 
                
                    if (estAdmin()) {
                        echo "<small> - Vous étes Admin</small>";
                    }else {
                        echo "<small> Vous etes connecté";

                        if ($_SESSION['membres']['civilite'] =='f') {
                            echo "e";
                    }
                    echo "!</small>";
                    }
                
                
                ?>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
            <?php echo $contenu; ?>
               <div class="card">
                   <div class="card-header">
                       <h2><?php echo $_SESSION['membres']['prenom'] . ' ' . $_SESSION['membres']['nom'];?></h2>
                   </div>
                   <div class="card-body">
                   
                       <p class="card-text">Civilité : <?php 
                       if ($_SESSION['membres']['civilite'] == 'm') {
                           echo "Homme";
                       }else{
                           echo "Femme";
                       }
                       
                       ?></p>
                       <address class="card-text"> <?php 
                       
                       echo $_SESSION['membres']['adresse'] . '<br>' . $_SESSION['membres']['code_postal'] . ' ' . $_SESSION['membres']['ville'];
                       
                       ?></address>
                       <p class="card-text">Pseudo : <?php echo $_SESSION['membres']['pseudo'];?></p>
                       <p class="card-text">Email : <?php echo $_SESSION['membres']['email'];?></p>
                      
              
                   </div>
                   <div class="card-footer text-muted">
                      <a href="profil.php?action=deconnexion" class="btn btn-sm btn-outline-primary">Se déconnecter</a>
                   </div>
               </div>
            </div>
        </div>
    </div>
    <?php }?>

    <!-- BOOTSWATCH JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>