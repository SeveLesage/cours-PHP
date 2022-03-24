<?php require('../inc/functions.php');



?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css -->

    <title>Le PHP - Insertion d'un elements</title>
</head>

<body>

    <?php 
    
    $pdoDialogue = new PDO(/**PDO est un objet qui représent la connexion entre une page en PHP et une BDD */
    'mysql:host=localhost;
    dbname=dialogue',/**dans le premier argument on précis locahost et le nom de la BDD */
    'root',/**dans le deuxieme argument on precise l'identifiant phpmyadmin */
    '',/**dans le troisieme argument on precise le mdp vide pour le PC */
    array(
        PDO :: ATTR_ERRMODE => PDO :: ERRMODE_WARNING,
        PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )/**Ici on precise comment on veut que les errurs soient gérées et le jeu de caractere utilisés */
    );
    
    ?>
    <div class="jumbotron">
        <h1 class="display-3">Inserer un element</h1>
        <p class="lead">Grâce a la superGlobales $_POST on va pouvoir envoyer des informations vers la base de donnée</p>

        <div class="col-12 col-md-6">
            <form action="#" method="POST" class="border p-2">

            <div class="mb-3">
                <label for="pseudo">Votre pseudo</label>
                <input type="text" name="pseudo" id="pseudo" class="form-control" require>
                <label for="message">Votre message</label>
                <input type="text" name="message" id="message" class="form-control" require>
                <button type="submit" class="btn btn-success">Envoyer votre commentaire</button>
            </div>


            </form>

            <?php 
            //Je traite le formulaire de façon securisé grâce à une requête préparée 

            if(!empty($_POST)) {//Je verifie que $_POST contient des informations

                $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);//grace a cette instruction je me premunie des faille et des injection SQL
                $_POST['message'] = htmlspecialchars($_POST['message']);

                $insertion = $pdoDialogue->prepare("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES (:pseudo, :message, NOW())");
                //pour la date enregistrement dans les valeur nous precision NOW qui va permettre de recuperer la date du jour. Les autre valeur sont précisée par la suite dans le execute 

                $insertion->execute( array(
                   
                        ':pseudo' => $_POST['pseudo'],
                        ':message' => $_POST['message'],

                ));//Grace à cette instruction le SQL comprend que l'on execupere ce qui se trouve dans l'export pseudo pour le pseudo et dans l'export message pour le message
            
            }

            
            ?>
        </div>
        <div class="col-12 col-md-6">
            <p>afficher les 5 derniers commentaires de la table commentaire Dans une ultime colonne, ajoutez u bouton modification</p>


            <?php 
                $requete = $pdoDialogue ->query("SELECT * FROM commentaire ORDER BY 'id_commentaire' DESC LIMIT 0,5");
          

                echo "
                <table class=\"table table-striped\">
                <thead>
                     <tr>
                         <th>ID</th>
                         <th>Pseudo</th>
                         <th>Message</th>
                         <th>Date d'enregistrement</th>
                         <th>Modification</th>

                     </tr>
                </thead>
     
                <tbody>
                     
                ";
     
                while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { 
     
                     echo "<tr>";
                     echo "<td>#" . $ligne['id_commentaire'] . "</td>";
                     echo "<td>" . $ligne['pseudo'] . "</td>";
                     echo "<td>" . $ligne['message'] . "</td>";
                     echo "<td>" . date('d/m/Y H:i:s' , strtotime($ligne['date_enregistrement'])) . "</td>";
                     echo "<td><a class=\"btn btn-primary\" href=\"03-fichedialogue.php?id_commentaire=".$ligne['id_commentaire']. "\">Modif</a></td>";
              
                     echo "</tr>";
     
                }//fin de la boucle
     
                echo "
                </tbody>
                </table>
                ";//je ferme mon tableau

                //Reception des informations d'un employés

    
          
            ?>

        </div>
 
    </div>

    <main class="container">

    
     
    

    



    </main>



    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>