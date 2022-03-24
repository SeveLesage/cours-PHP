<?php
// 1- Méthodes de debug
require('inc/functions.php');

// 2- Connexion à la BDD
$pdoWf3_php_intermediaire_severine = new PDO(
    'mysql:host=localhost;dbname=wf3_php_intermediaire_severine',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);

// 3- Vérification du formulaire d'insertion
if (!empty($_POST)) {
    $_POST['title'] = htmlspecialchars($_POST['title']);
    $_POST['description'] = htmlspecialchars($_POST['description']);
    $_POST['postal_code'] = htmlspecialchars($_POST['postal_code']);
    $_POST['city'] = htmlspecialchars($_POST['city']);
    $_POST['type'] = htmlspecialchars($_POST['type']);
    $_POST['price'] = htmlspecialchars($_POST['price']);

  
    $insertion = $pdoWf3_php_intermediaire_severine->prepare(" INSERT INTO advert (title, description, postal_code, city, type, price) VALUES (:title, :description, :postal_code, :city, :type, :price) ");

    $insertion->execute(array(
        ':title' => $_POST['title'],
        ':description' => $_POST['description'],
        ':postal_code' => $_POST['postal_code'],
        ':city' => $_POST['city'],
        ':type' => $_POST['type'],
        ':price' => $_POST['price'],
      
    ));
}





?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- BOOTSwatch -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Backoffice entreprise - Employés</title>

</head>

<body>
     <!-- 3-Ma nav en require_once -->
     <header>

<?php require_once('inc/menu.inc.php'); ?>

</header>
<!--    fin header  -->
<main>

    <div class="bg-white mt-2 mb-2 m-auto p-3">
        <section class="row">
        

                <div class="col-12">
                    <h2 class="text-center mb-4">Ajouter une annonce</h2>

                    <form action="#" method="POST" class="border bg-light p-2 rounded mx-auto">

                        <div class="mb-3">
                            <label for="title">Titre :</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div><!-- title -->

                        <div class="mb-3">
                            <label for="description">Description :</label>
                            <input type="text" name="description" id="description" class="form-control" required>
                        </div><!-- description -->

                        <div class="mb-3">
                            <label for="postal_code">Code postal :</label>
                            <input type="text" name="postal_code" id="postal_code" class="form-control" required>
                        </div><!-- postal_code -->

                        <div class="mb-3">
                            <label for="city">Ville :</label>
                            <input type="text" name="city" id="city" class="form-control" required>
                        </div><!-- city -->

                        <div class="mb-3">
                            <label for="type">Type :</label>
                            <select name="type" id="type">
                                <option value="vente">Vente</option>
                                <option value="location">Location</option>
                            </select>
                        </div><!-- type -->

                        <div class="mb-3">
                            <label for="price">Prix :</label>
                            <input type="text" name="price" id="price" class="form-control" required>
                        </div><!-- city -->
                     

                        <button type="submit" class="btn btn-dark" name="submit" id="submit">Ajouter une annonce</button><!-- BOUTON SUBMIT -->

                    </form>
                </div>
                <!-- fin col -->

            </section>
            <!-- fin row -->

        </div>
        <!-- fin container  -->



    </main>

    <footer>
        <p class="text-center">PIED DE PAGE</p>
    </footer>
   
</body>

</html>