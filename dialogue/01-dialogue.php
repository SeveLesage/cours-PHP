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
           <div class="col-12">
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


           <div class="col-12">
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

           <p> afficher tous les commentaire dans un tableau avec l'id dans une colonne le pseudo dans un autre colonne et enfin le message dans la derniere colonne avec une boucle while</p>
           

           <?php 
           
           $requete = $pdoDialogue ->query("SELECT * FROM commentaire");//je rentre la requete dans ma variable $requete, je selection tous les evenement qui se trouve dans la table commentaire
          

           echo "
           <table class=\"table table-striped\">
           <thead>
                <tr>
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>Message</th>
                    <th>Date d'enregistrement</th>
                </tr>
           </thead>

           <tbody>
                
           ";//Ici je fais echo de mon tableau en PHP => ici l'ouverture ainsi que le thead de mon tableau

           while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { //grâce a la boucle while (tant que) j'execute le bloc de code tant que j'ai des renseignement qui correspond à ma requete

                echo "<tr>";
                echo "<td>#" . $ligne['id_commentaire'] . "</td>";//je boucle l'id_commentaire
                echo "<td>" . $ligne['pseudo'] . "</td>";//je boucle le pseudo
                echo "<td>" . $ligne['message'] . "</td>";//je boucle le message
                echo "<td>" . date('d/m/Y H:i:s' , strtotime($ligne['date_enregistrement'])) . "</td>";//je boucle date d'enregistrement avec code php date converti en français 
                //ici si quand on affiche la date sans la modifier elle client comme elle est dans PHP en anglais On utilise donc la fonction predefinie date() afin de modifier son format. la fonction strotime() string to time permet de dire
                //que l'on veu qu'une chaine de caractere soit considere comme un format date/heure.
                echo "</tr>";

           }//fin de la boucle

           echo "
           </tbody>
           </table>
           ";//je ferme mon tableau

           
           ?>

           <p>Rajoutez une colonne à votre tableau avec la notion de date d'enregistrement. Attention, pensez bien à regarder sur la doc de PHP pour le format date/heure</p>
           

           <p>afficher la liste de toutes les personnes qui on écrit des commentaires, ainsi que la date à laquelle le commentaire a été écrit dans une ol</p>
           
           <?php 
           $requete = $pdoDialogue ->query("SELECT pseudo, date_enregistrement FROM commentaire");

           echo "
                <ol class=\"alert alert-success\">
                
           ";//Ici je fais echo de mon tableau en PHP => ici l'ouverture ainsi que le thead de mon tableau

           //while pourquoi tant qu 'il ya des enrigistrement on boucle

           while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) //grâce a la boucle while (tant que) j'execute le bloc de code tant que j'ai des renseignement qui correspond à ma requete
            {
          
                echo "<li>" . $ligne['pseudo'] . " " . date('d/m/Y' , strtotime($ligne['date_enregistrement'])). "</li>";//je boucle le pseudo//je boucle date d'enregistrement avec code php date converti en français 
                //ici si quand on affiche la date sans la modifier elle client comme elle est dans PHP en anglais On utilise donc la fonction predefinie date() afin de modifier son format. la fonction strotime() string to time permet de dire
                //que l'on veu qu'une chaine de caractere soit considere comme un format date/heure.
            }        

           //fin de la boucle

           echo "
       
           </ol>
           ";//je ferme mon tableau
           
           
           
           ?>

           <p>Compter le nombre d'enrigistrement dans une page </p>

           <?php 
           
            $requete = $pdoDialogue->query("SELECT * FROM commentaire");// je selectionne tous les elements qui se trouvent dans ma table commentaire

            $nbrCommentaire = $requete->rowCount();//ici je compte le nombre de rangér renvoyée par ma requete

            echo "<p>Il ya  $nbrCommentaire commentaires dans la table.</p>";//grâce a la fonction predefinie rowCount() on va pouvoir compter le nombre d'enregistrement qui correspond a notre requete et ainsi verifier que le navigateur recupere bien toutes les données.
           ?>


            </div>
       </section>
     
    

    



    </main>



    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>