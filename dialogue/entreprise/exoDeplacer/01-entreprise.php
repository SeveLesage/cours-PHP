<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css -->

    <style>
        * {
        font-family: Verdana, Geneva, Tahoma, sans-serif;

        }

        body {
            background-color: gray;
        }

        .container {
            background-color: white;
        }

        h1 {
            font-size: 1.8em;
            font-weight: bold;
            text-align: center;
            color: gray;
        }

        h2 {
            color: gray;
            font-size: 1.2em;
            font-weight: lighter;
        }


    </style>

    <title>BACK OFFICE ENTREPRISE </title>
</head>

<body>

    <?php 
    
    $pdoEntreprise = new PDO(/**PDO est un objet qui représent la connexion entre une page en PHP et une BDD */
    'mysql:host=localhost;
    dbname=entreprise',/**dans le premier argument on précis locahost et le nom de la BDD */
    'root',/**dans le deuxieme argument on precise l'identifiant phpmyadmin */
    '',/**dans le troisieme argument on precise le mdp vide pour le PC */
    array(
        PDO :: ATTR_ERRMODE => PDO :: ERRMODE_WARNING,
        PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )/**Ici on precise comment on veut que les errurs soient gérées et le jeu de caractere utilisés */
    );
    
    ?>

    <div class="container">
    <div class="jumbotron">
        <h1 class="display-3">Accueil</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto recusandae explicabo veritatis neque. Quae ducimus qui excepturi, porro nam fugiat, et veniam modi magnam, dignissimos iure officia quisquam fuga magni?
        Vero ex sequi similique maxime repudiandae odit voluptatibus natus saepe minima ipsam est voluptatem quia hic tempore magnam optio officiis officia, mollitia tempora ipsa dolores quae? Dolores atque ab sequi!
        Commodi ex illo quisquam reprehenderit. Accusantium rerum beatae non iure dolor veniam, odit numquam dicta doloremque unde nobis nihil pariatur fugit expedita. Quod accusantium, autem temporibus ducimus dolores ea enim?
        Adipisci facilis, repudiandae nihil tempore neque consequatur accusantium labore ea ad, illum quaerat sequi earum nulla natus, dolore optio obcaecati similique esse quos debitis commodi quisquam in dicta voluptate. Ullam?
        Reiciendis ipsam consequatur neque et cupiditate impedit autem ab? Reprehenderit nobis excepturi nisi doloremque dicta vitae obcaecati recusandae quae delectus dolorum exercitationem voluptatum suscipit quisquam cumque quibusdam, repudiandae ducimus ex?
        Vel tempore, quidem quas totam quae dignissimos iusto ipsam eos quaerat distinctio reiciendis id quo sapiente fugit, error harum aliquid in ea, modi rerum neque a quibusdam. Excepturi, porro et?
        Consequuntur, perspiciatis cumque magnam amet sit recusandae accusamus nobis praesentium quis dicta ducimus dolor, excepturi unde. Repudiandae id aspernatur quia, quisquam molestias expedita laborum voluptatum tenetur placeat, quae ad dolore.
        Fuga ratione numquam explicabo. Qui fuga dignissimos voluptate, eum molestiae nesciunt laboriosam ex est natus, atque eligendi maiores itaque quam dicta, dolore placeat! Accusantium porro voluptatem, assumenda animi maiores eaque.
        Suscipit commodi saepe, inventore sapiente, soluta nobis vel dignissimos neque harum doloremque nam dolor amet ex! Dolorum, voluptates, ratione, harum voluptatem iure quod aliquid nesciunt cum consequatur est nemo exercitationem.
        Cumque sequi sapiente numquam incidunt aliquid in aut tempore non, est expedita qui, architecto reiciendis ut vero dolorum. Cumque aliquid illo quisquam odio ex tempora ducimus beatae cupiditate quas molestias.</p>


        <h2>Tableau des personnes qui travail à la direction :</h2>
        <?php 
        
        $requete = $pdoEntreprise->query("SELECT * FROM employes WHERE service='direction' ORDER BY salaire DESC");// je selectionne tous les elements qui se trouvent dans ma table commentaire

        echo "
                <table class=\"table table-striped\">
                <thead>
                     <tr>
                         <th>ID</th>
                         <th>Nom</th>
                         <th>Prenom</th>
                         <th>sexe</th>
                         <th>Service</th>
                         <th>date d'embauche</th>
                         <th>Salaire</th>

                     </tr>
                </thead>
     
                <tbody>
                     
                ";
     
                while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { 
     
                     echo "<tr>";
                     echo "<td>" . $ligne['id_employes'] . "</td>";
                     echo "<td>" . $ligne['nom'] . "</td>";
                     echo "<td>" . $ligne['prenom'] . "</td>";
                     echo "<td>" . $ligne['sexe'] . "</td>";
                     echo "<td>" . $ligne['service'] . "</td>";
                     echo "<td>" . $ligne['date_embauche'] . "</td>";
                     echo "<td>" . $ligne['salaire'] . "</td>";
                     
                    
              
                     echo "</tr>";
     
                }//fin de la boucle
     
                echo "
                </tbody>
                </table>
                ";//je ferme mon tableau

        
        
        
        ?>
        
 
    </div>
    </div>

    


    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>