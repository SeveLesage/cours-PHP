<?php 
// j'inclu require ma connection a ma base de donnée
require('bdd.inc.php');
//je fais ma requête pour afficher un tableau 
$requete = $pdoBlog->query("SELECT * FROM articles");
//Grâce aux valeurs precisées apres le limit de preciser d'abord que je veux commencer au premier elements du tableau et je precise en suite que je veux limiter à 5 éléments

//traitement de l'ajout de l'article

if(!empty($_POST)) {/* SI le formulaire n'est pas vide, j'exécute ce qui suit */
    /* Je m'assure que je n'ai pas d'insertion de SQL et de failles */
   
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['contenu'] = htmlspecialchars($_POST['contenu']);
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['auteur'] = htmlspecialchars($_POST['auteur']);
    $_POST['date_parution'] = htmlspecialchars($_POST['date_parution']);
   
};

/* je prepare une requete avec des marqueur vides pour l'instant */

$insertion = $pdoBlog->prepare("INSERT INTO articles (titre, contenu, image, auteur, date_parution) VALUES (:titre, :contenu, :image, :auteur, :date_parution)");
    //je fais correspondre mes marqueurs vides aux elements de mon form
    $insertion->execute(array(
        
        ':titre' => $_POST['titre'],
        ':contenu' => $_POST['contenu'],
        ':image' => $_POST['image'],
        ':auteur' => $_POST['auteur'],
        ':date_parution' => $_POST['date_parution'],
        /* Mes marqueurs sont maintenant remplis avec les données récupérées grâce au name dans le formulaire */
    ));

    /* iniatilisation de la vriable contenu qui va servir pour  les message de reussite ou l'erreur pour la suppression */

    $contenu = ""; //je fais bien attention il ne faut pas mettre d'espace pour l'initialisation

    //suppression d'un article

    if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id'])) {
        // si l'indice "action" existe dans $_GET et que sa valeur est "suppression" et que l'indice "id_employes" existe  aussi, alors je peux traiter la suppression de l'employé demandé // Voir lien sur le bouton suppression
    
        $delete = $pdoEntreprise->prepare(" DELETE FROM articles WHERE id = :id ");
    
        $delete->execute(array(
            ':id' => $_GET['id']
        ));
    
        if ($delete->rowCount() == 0) {
            $contenu .= '<div class="alert alert-danger">Erreur de suppression de l\'employé n° ' . $_GET['id'] . ' </div>';
        } else {
            $contenu .= '<div class="alert alert-success">L\'employé n° ' . $_GET['id'] . ' a bien été supprimé </div>';
        }
    };



 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les articles</title>
    <!-- Boostrap lux cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="jumbotron">
        <div class="container">
        <h1 class="display-3">Back office Blog</h1>
        <p class="lead">Page des articles</p>
    </div>
    </div>

    <div class="container">
        <div class="row">
            <?php  echo $contenu; ?>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TITRE</th>
                            <th>CONTENU</th>
                            <th>IMAGE</th>
                            <th>AUTEUR</th>
                            <th>DATE DE PARUTIONS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                            <?php 
                                while($article = $requete->fetch(PDO::FETCH_ASSOC)) {
                            ?> <!-- Ouverture d'une boucle while // ce n'est pas parce que je suis plus dans un passage PHP que ma boucle ne continu pas // tant que je n'est pas mis l'accolade fermante la boucle continu -->
                                <tr>
                                    <td><?php echo $article['id'];?></td>
                                    <td><?php echo $article['titre'];?></td>
                                    <td><?php echo $article['contenu'];?></td>
                                    <td><img src="<?php echo $article['image']; ?>" alt="illustration" class='img-fluid'></td>
                                    <td><?php echo $article['auteur'];?></td>
                                    <td><?php echo date('d-m-Y', strtotime($article['date_parution']));?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="articles.php?id=<?php echo $article['id']; ?>" class='btn btn-primary'>Modifier</a>
                                            <a href="articles.php?action=suppression&id=<?php echo $article['id']; ?>" class="btn btn-danger" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet employé ?'))">Supprimer</a>
                                        </div>
                                    </td>

                                </tr>
                                <?php }?>

            

                    </tbody>
                </table>


            </div>

            <div class="col-8 mx-auto">
                <h2 class="text-center">Ajout d'un article</h2>
                <form action="#" method="POST" class="border bg-light p-2 rounded mx-auto">
                                <div class="mb-3">
                                    <label for="titre">Titre de l'article</label>
                                    <input type="text" name="titre" id="titre" class="form-control" required> <!-- l'attribut name sert à recupererce qui se trouvedans l'xport pour l'envoyer dans la base de données c'est la raison pour laquelle il faut absolument que le name corresponde à la colonne de notre bdd
                                
                                    Pour que quand je cliquer sur le label j'arrive directement dans l'export, je dois mettre la même classe dans le label FOR et dans l'input ID -->
                                </div><!-- titre -->

                                <div class="mb-3">
                                    <label for="contenu">Contenu de l'article </label>
                                    <input type="text" name="contenu" id="contenu" class="form-control" required> <!-- controle D je selectionne tous les elements pareils -->
                                </div><!-- contenu -->

                                <div class="mb-3">
                                    <label for="image">Images</label>
                                    <input type="text" name="image" id="image" class="form-control" required placeholder="URL de l'image"> <!-- controle D je selectionne tous les elements pareils -->
                                </div><!-- image -->

                                <div class="mb-3">
                                    <label for="auteur">Auteur</label>
                                    <input type="text" name="auteur" id="auteur" class="form-control" required> <!-- controle D je selectionne tous les elements pareils -->
                                </div><!-- auteur -->

                                <div class="mb-3">
                                    <label for="date_parution">Date de parution</label>
                                    <input type="date" name="date_parution" id="date_parution" class="form-control" required> <!-- controle D je selectionne tous les elements pareils -->
                                </div><!-- date de parution-->

                                <button type="submit" class="btn btn-primary" name="submit">Ajouter l'article</button><!-- bouton -->

                </form>
            </div>
        </div>
    </div>
</body>
</html>