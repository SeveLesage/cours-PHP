<?php

// connexion BDD et debug
require('inc/init.inc.php');

//ma requete pour afficher les 15 derniers bien immobilier

if (isset($_GET['id'])) {
    $requete = $pdoAppart->prepare("SELECT * FROM advert WHERE id = :id");

    $requete->execute(array(

        ':id' => $_GET['id']//j'associe mon marqueur vide à l'id que je recupere dans l'url

    ));

    if ($requete->rowCount()== 0) {
            header('location:annonces.php');
            exit();
    }
    $annonce = $requete->fetch(PDO::FETCH_ASSOC); {

    }


} else {
    header('location:annonces.php');
    exit();
}


//formulaire update

$contenu = "";//initializer varrible servir si message d'erreur

if (!empty($_POST)) {
    
    if (empty($_POST['reservation_message']) || $_POST['reservation_message'] < 5) {//je verifie que le champs reservation est bien rempli
        
        $contenu .= "<div class=\"alert alert-danger\">Le champs de reservation doit contenir au moins 5 caractéres !</div>";//si il est pas rempli j'envoi un message d'erreur 
    //j'insere l'element dans la base de données
            $_POST['reservation_message'] = htmlspecialchars($_POST['reservation_message']);

            $maj = $pdoAppart->prepare("UPDATE advert SET reservation_message = :reservation_message WHERE id = :id");

            $maj->execute(array(

                ':id' => $_GET['id'],
                ':reservation_message' => $_POST['reservation_message'],

            ));

           
    }

    header('location:annonce.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Le Bon appart - <?php echo $annonce['title']?></title>

    <!-- cdn ck editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
     <!-- Le lien ck editor coller entete
        On colle le script avant la fermeture de body
        Dans le script l'id qui coorespond à notre element
        C'est une page exclusivement accesible a l'admin le htmchars de l'element conserner (champs)peut etre effacer
        comme c'est une page accessible pour toutes le monde on enleve pas le htmlspecialchar pour pas que les gens malveillants pissent nous injecter du sql
        on va donc ajouter une fonction predefini qui va nous permettre de lire les balise correctement html_entite_decode(le texte qui doit etre analysé)
-->
  </head>
  <body>

  <?php require('inc/nav.inc.php')?>
    <div class="jumbotron text-center">
        <h1 class="display-3"><?php echo $annonce['title']?></h1>
        <p class="lead"><?php echo $annonce['type']?></p>
        <p class="lead">

            <small>
                <?php  $formatArgent = numfmt_create('fr_FR', NumberFormatter::CURRENCY);
                echo numfmt_format_currency($formatArgent, $annonce['price'], "EUR")
                 ?>

            </small> <br>

            <small class="text-uppercase"><?php echo $annonce['city']?></small>
                          
                            
        </p>
       
    </div>

    <div class="container">
        <div class="row">
          <div class="col-7 mx-auto">
                <figure>
                    <img src="<?php echo $annonce['image']?>" alt="image de l'annonce" class="img-fluid"> <?php echo $annonce['title']?>
                </figure>

                <?php echo $annonce['description']?>
          </div>

        </div><!-- fin row -->

        <div class="col-12 col-md-6 mx-auto">
            <?php 
                if (empty($annonce['reservation_message'])) {//
   
            
            ?>

            <h2>Réservation du bien</h2>

                    <form action="#" method="post">
                        <div class="mb-3">
                            <label for="reservation_message">Votre message de réservation</label>
                            <textarea name="reservation_message" id="reservation_message" cols="30" rows="10" class="form-control"></textarea>
                            <?php echo $contenu; ?>
                        </div>
                        <button class="alert alert-danger">Je réserve</button>
                    </form>

            <?php }else{?>

                <div class="alert alert-danger text-center">
                    Ce bien à déja ete réservé <br>
                    Message de réservation : <?php echo html_entity_decode($annonce['reservation_message']); ?>
                </div>

                <?php }?>

        </div>
    </div><!-- fin container -->




   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <!-- ck editor -->
     <script>
    ClassicEditor
        .create( document.querySelector( '#reservation_message' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
  </body>
</html>


