<?php
// 1- Méthodes de debug
require('inc/functions.php');

// 2- Connexion à la BDD
$pdoEntreprise = new PDO(
    'mysql:host=localhost;dbname=entreprise',
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
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
    $_POST['nom'] = htmlspecialchars($_POST['nom']);
    $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
    $_POST['service'] = htmlspecialchars($_POST['service']);
    $_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']);
    $_POST['salaire'] = htmlspecialchars($_POST['salaire']);

    /* Je prépare ma requête avec des marqueurs pour l'instant vides */
    $insertion = $pdoEntreprise->prepare(" INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire) ");

    $insertion->execute(array(
        ':prenom' => $_POST['prenom'],
        ':nom' => $_POST['nom'],
        ':sexe' => $_POST['sexe'],
        ':service' => $_POST['service'],
        ':date_embauche' => $_POST['date_embauche'],
        ':salaire' => $_POST['salaire'],
        /* Mes marqueurs sont maintenant remplis avec les données récupérées grâce au name dans le formulaire */
    ));
}

//3 -INITIALISATION DE DE LA VARIABLE CONTENU QUI VA NOUS SERVIR POUR LA SUITE 


// 4- J'initialise ma variable $contenu qui va me servir par la suite
$contenu = "";

// 5- Suppression d'un élément
// jevar_dump($_GET);/* Vérification de ce que je récupère dans le get */
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_employes'])) {
    // si l'indice "action" existe dans $_GET et que sa valeur est "suppression" et que l'indice "id_employes" existe  aussi, alors je peux traiter la suppression de l'employé demandé // Voir lien sur le bouton suppression

    $resultat = $pdoEntreprise->prepare(" DELETE FROM employes WHERE id_employes = :id_employes ");/* Je prépare ma requête avec un marqueur vide  ':id_employes'*/

    $resultat->execute(array(
        ':id_employes' => $_GET['id_employes']
    ));/* Je signifie que le marqueur vide correspond à l'id_employes récupéré dans $_GET id_employes  */

    if ($resultat->rowCount() == 0) { /* ça signifie que je ne renvoir rien  donc ça n'a pas fonctionné*/
        $contenu .= '<div class="alert alert-danger">Erreur de suppression de l\'employé n° ' . $_GET['id_employes'] . ' </div>';/* si ça n'a pas fonctionné j'affiche ça */
    } else {
        $contenu .= '<div class="alert alert-success">L\'employé n° ' . $_GET['id_employes'] . ' a bien été supprimé </div>';/* sinon j'affiche ça */
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

            <section class="row">

                <div class="col-12 col-lg-8 table-responsive">
                    <h2 class="text-center">Les employés</h2>
                    <?php
                    // 2- J'affiche un tableau avec les personnes travaillant dans l'entreprise
                    $requete = $pdoEntreprise->query(" SELECT * FROM employes ");
                    ?>

                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Sexe</th>
                                <th>Service</th>
                                <th>Salaire</th>
                                <th>Date d'embauche</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ouverture de la boucle while -->
                            <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr class="text-center">
                                    <td><?php echo $ligne['id_employes']; ?></td>
                                    <td><?php echo $ligne['nom']; ?></td>
                                    <td><?php echo $ligne['prenom']; ?></td>
                                    <td><?php
                                        if ($ligne['sexe'] == 'f') {
                                            echo "Femme";
                                        } else {
                                            echo "Homme";
                                        }
                                        ?></td>
                                    <td><?php echo $ligne['service']; ?></td>
                                    <td><?php echo $ligne['salaire']; ?> €</td>
                                    <td><?php echo date('d-m-Y', strtotime($ligne['date_embauche'])); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="03-entreprise.php?id_employes=<?php echo $ligne['id_employes']; ?>" class="btn btn-success">Voir</a>
                                            <!-- Ici le bouton pour la suppression = 
                                                  1- Je lui passe l'action suppression
                                                  2- je lui passe l'id de l'employé  
                                                    -->
                                            <a href="02-entreprise.php?action=suppression&id_employes=<?php echo $ligne['id_employes']; ?>" class="btn btn-danger" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet employé ?'))">Supprimer</a>
                                        </div>
                                    </td>
                                </tr>
                                
                            <?php } ?><!-- fermeture de la boucle -->
                        </tbody>
                    </table>

                </div><!-- fin col -->

                <div class="col-12 col-lg-4">
                    <h2 class="text-center mb-4">Ajout d'un employé</h2>

                    <form action="#" method="POST" class="border bg-light p-2 rounded mx-auto">

                        <div class="mb-3">
                            <label for="prenom">Prénom de l'employé :</label>
                            <input type="text" name="prenom" id="prenom" class="form-control" required>
                        </div><!-- PRENOM -->

                        <div class="mb-3">
                            <label for="nom">Nom de l'employé :</label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                        </div><!-- NOM -->
                        
                        <div class="mb-3">
                            <label for="sexe">Genre :</label> <br>
                            <input type="radio" name="sexe" value="m" id="sexe" checked> Homme <br>
                            <input type="radio" name="sexe" value="f" <?php if (isset($fiche['sexe']) && $fiche['sexe'] == 'f') echo ' checked'; ?> id="sexe"> Femme
                        </div><!-- GENRE -->

                        <div class="mb-3">
                            <label for="service">Service de l'employé :</label>
                            <select name="service" id="service" class="form-select">
                                <?php
                                $requete_service = $pdoEntreprise->query("SELECT DISTINCT service FROM employes");
                                while ($service = $requete_service->fetch((PDO::FETCH_ASSOC))) {
                                    echo "<option value=\"" . $service['service'] . "\" >" . $service['service'] . "</option>";
                                }
                                ?>
                            </select>
                        </div><!-- SERVICE -->

                        <div class="mb-3">
                            <label for="date_embauche" class="form-label">Date d'embauche</label>
                            <input type="date" name="date_embauche" id="date_embauche" class="form-control" required>
                        </div><!-- DATE D'EMBAUCHE -->

                        <div class="mb-3">
                            <label for="salaire">Salaire :</label>
                            <input type="number" name="salaire" id="salaire" class="form-control" required>
                        </div><!-- SALAIRE -->

                        <button type="submit" class="btn btn-success" name="submit" id="submit">Ajouter l'employé</button><!-- BOUTON SUBMIT -->

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