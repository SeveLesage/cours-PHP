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

    <title>Le PHP - Connexion à une BDD</title>
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
        <h1 class="display-3">Connexion a la BDD dialogue</h1>
        <p class="lead">Dans cette page nous allons nous connecter à la BDD et créer un formulaire qui grâce à la superglobale $_POST enverra les infos en BDD.</p>
 
    </div>

    <main class="container">

       <section class="row">
           <div class="col-12 col-md-6">
               <h2>Base de données "dialogue"</h2>
               <p>Notre BDD dialogue ne posséde qu'une seule table, table commentaire
                   Cette table possede les champs suivants
               </p>
               <ul>
                   <li>id_commentaire INT PK AI</li>
                   <li>pseudo VARACHAR 255</li>
                   <li>message TEXT</li>
                   <li>date_enregistrement DATETIME</li>
               </ul>


           </div>


           <div class="col-12 col-md-6">
               <h2>Exercice</h2>
              <p>Afficher le commentaire là ou le pseudo corresponds a timothée</p>
           
           <?php 
           
           $requete = $pdoDialogue ->query("SELECT * FROM commentaire WHERE pseudo='Timothée'");/**pseudo timothée dans la variable $requete je fais ma requete en SQL grâce au mot a la fonction query cette derniere doit automitiquement 
           s'appuyer sur ma variable dans laquelle j'ai placé les informations de connexion */

           jeprint_r($requete);/**je débugger (afficher les informations qui sont dans une fonction ou varaible) grâce a ma fonction print_r */
           $ligne = $requete ->fetch(PDO :: FETCH_ASSOC);/***/
           //jeprint_r($ligne);
           echo '<ul>
           
           <li>Id : '. $ligne['id_commentaire']. '</li>
           <li>Pseudo : '. $ligne['pseudo']. '</li>
           <li>Message : '. $ligne['message']. '</li>
           
           
           </ul>';
           
           
           ?>

        
           
            </div>
       </section>
     
    

    



    </main>



    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>