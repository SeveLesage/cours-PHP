<?php

// connexion BDD et debug
require('inc/init.inc.php');

//traitement du formulaire pour l'insertion en BDD

if (!empty($_POST)) {
    //VERIFICATION SQL EST FAILLES
    $_POST['title'] = htmlspecialchars($_POST['title']);
    $_POST['description'] = ($_POST['description']);
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['postal_code'] = htmlspecialchars($_POST['postal_code']);
    $_POST['city'] = htmlspecialchars($_POST['city']);
    $_POST['type'] = htmlspecialchars($_POST['type']);
    $_POST['price'] = htmlspecialchars($_POST['price']);


$insertion = $pdoAppart->prepare("INSERT INTO advert (title, description, image, postal_code, city, type, price, reservation_message) VALUES (:title, :description, :image, :postal_code, :city, :type, :price, NULL)");

$insertion->execute(array(
    ':title' => $_POST['title'],
    ':description' => $_POST['description'],
    ':image' => $_POST['image'],
    ':postal_code' => $_POST['postal_code'],
    ':city' => $_POST['city'],
    ':type' => $_POST['type'],
    ':price' => $_POST['price'],
));

header('location:annonces.php');
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

    <title>Le Bon appart - Ajouter une annonce</title>

    <!-- cdn ck editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <!-- Le lien ck editor coller entete
        On colle le script avant la fermeture de body
        Dans le script l'id qui coorespond à notre element
        C'est une page exclusivement accesible a l'admin le htmchars de l'element conserner (champs)peut etre effacer
        comme c'est une page accessible pour toutes le monde on enleve pas le htmlspecialchar pour pas que les gens malveillants pissent nous injecter du sql
-->

  </head>
  <body>
  <?php require('inc/nav.inc.php')?>
    <div class="jumbotron">
        <h1 class="display-3">Le Bon Appart</h1>
        <p class="lead">Ajout d'une annonce</p>
       
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                    <!-- formulaire pour inserer les elements dans la BDD -->
                    <form action="#" method="post" class="p-3 bg-light border border-primary rounded shadow">

                        <div class="mb-3">
                            <label for="title">Titre du bien</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div><!-- titre -->

                        <div class="mb-3">
                            <label for="description">Description du bien</label>
                            <textarea type="text" name="description" id="description" class="form-control"></textarea>
                        </div><!-- description -->

                        <div class="mb-3">
                            <label for="image">Image du bien</label>
                            <input type="text" name="image" id="image" class="form-control" placeholder="URL de l'image">
                        </div><!-- image -->

                        <div class="mb-3">
                            <label for="postal_code">Code Postal</label>
                            <input type="number" name="postal_code" id="postal_code" class="form-control">
                        </div><!-- code postal -->

                        <div class="mb-3">
                            <label for="city">Ville du bien</label>
                            <input type="text" name="city" id="city" class="form-control">
                        </div><!-- ville -->

                        <div class="mb-3">
                            <label for="type">Type du bien</label>
                            <select name="type" id="type" class="form-select">
                                <option value="">-- Choisir une option --</option>
                                <option value="location">location</option>
                                <option value="vente">vente</option>
                            </select>
                        </div><!-- type -->

                        <div class="mb-3">
                            <label for="price">Prix du bien</label>
                            <input type="number" name="price" id="price" class="form-control">
                            
                        </div><!-- prix -->

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Ajouter le bien</button>
                        </div><!-- titre -->


                    </form>
                    <!-- fin du form -->
            </div><!-- fin de la col -->
        </div><!-- fin row -->
    </div><!-- fin container -->




   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- ck editor -->
    <script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>

  </body>
</html>