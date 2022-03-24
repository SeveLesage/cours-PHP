<?php 


require('inc/init.inc.php');
require('inc/functions.php');

//afficher un id

if (isset($_GET['id'])) {//isset est qu'il est defini(existe)
    $resultat = $pdoWf3_php_intermediaire_severine->prepare(" SELECT * FROM advert WHERE id = :id ");
  
    $resultat->execute(array(
        ':id' => $_GET['id'] // on associe le marqueur vide à l'id
    ));

    $fiche = $resultat->fetch(PDO::FETCH_ASSOC);
    if ($resultat->rowCount() == 0) {
        header('location:toutes_annonces.php');
        exit();
        
    } 
} else { // si la personne vient sur la page 
    header('location:toutes_annonces.php');
    exit();
}


//test reserver ou pas reserver

//mise à jour de l'annonce

if (!empty($_POST)) {
    $_POST['title'] = htmlspecialchars($_POST['title']);
    $_POST['description'] = htmlspecialchars($_POST['description']);
    $_POST['postal_code'] = htmlspecialchars($_POST['postal_code']);
    $_POST['city'] = htmlspecialchars($_POST['city']);
    $_POST['type'] = htmlspecialchars($_POST['type']);
    $_POST['price'] = htmlspecialchars($_POST['price']);
    $_POST['reservation_message'] = htmlspecialchars($_POST['reservation_message']);

    $resultats = $pdoWf3_php_intermediaire_severine->prepare("UPDATE articles SET title = :title, description = :description, postal_code = :postal_code, city = :city, type = :type, price = :price, reservation_message = :reservation_message WHERE id = :id");

    $resultats->execute(array(

        ':title' => $_POST['title'],
        ':description' => $_POST['description'],
        ':postal_code' => $_POST['postal_code'],
        ':city' => $_POST['city'],
        ':type' => $_POST['type'],
        ':price' => $_POST['price'],
        ':reservation_message' => $_POST['reservation_message'],
        ':id' => $_GET['id'],

    ));

    header('location:toutes_annonces.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le bon appart - Consulter</title>

      <!-- BOOTSwatch -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php require_once('inc/menu.inc.php') ?>
    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3 text-center fs-1">Consulter une annonce</h1>
           
        </div>
    </div>
    <main class="container">
        <section class="row my-5">
                    <h2>Fiche de l'annonce</h2>
            <div class="col-md-4 alert-primary rounded p-5">
                <!-- J'affiche toutes les informations relatives à l'annonce -->

               

                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Id : <?php echo $fiche['id']; ?></p>
                        <p class="text-text text-uppercase"><?php echo $fiche['title']; ?></p>
                        <p class="card-text">Service : <?php echo $fiche['description']; ?></p>
                        <p class="card-text">Code postal :<?php echo $fiche['postal_code']; ?></p>
                        <p class="card-text">Ville : <?php echo $fiche['city']; ?> </p>
                        <p class="card-text">Type : <?php echo $fiche['type']; ?></p>
                        <p class="card-text">Prix : <?php echo $fiche['price']; ?>€</p>
                        <p class="card-text">Reservation message : <?php echo $fiche['reservation_message']; ?></p>
                    </div>
                </div>
           
            </div>

            <!-- fin  -->

        </section>

        <div class="bg-white mt-2 mb-2 m-auto p-3">
        <section class="row">
        

                <div class="col-12">
                    <h2 class="text-center mb-4">Mise à jour de l'annonce</h2>

                    <form action="#" method="POST" class="border bg-light p-2 rounded mx-auto">

                        <div class="mb-3">
                            <label for="title">Titre :</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div><!-- title -->

                        <div class="mb-3">
                            <label for="description">Description :</label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div><!-- description -->

                        <div class="mb-3">
                            <label for="postal_code">Code postal :</label>
                            <input type="text" name="postal_code" id="postal_code" class="form-control">
                        </div><!-- postal_code -->

                        <div class="mb-3">
                            <label for="city">Ville :</label>
                            <input type="text" name="city" id="city" class="form-control">
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
                            <input type="text" name="price" id="price" class="form-control">
                        </div><!-- price -->

                        <div class="mb-3">
                            <label for="reservation_message">Réservation :</label>
                            <input type="text" name="reservation_message" id="reservation_message" class="form-control" >
                        </div><!-- reserver -->
                     
                     

                        <button type="submit" class="btn btn-dark" name="submit" id="submit">Mise à jour</button><!-- BOUTON SUBMIT -->

                    </form>
                </div>
                <!-- fin col -->

            </section>
            <!-- fin row -->
</body>
</html>