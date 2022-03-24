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

    <title>BACK OFFICE ENTREPRISE salariés </title>
</head>

<body>

<!-- debut PHP -->
    <?php 
    
    $pdoEntreprise = new PDO(
    'mysql:host=localhost;
    dbname=entreprise',
    'root',
    '',
    array(
        PDO :: ATTR_ERRMODE => PDO :: ERRMODE_WARNING,
        PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
    );
    
    ?>
    <!-- fin PHP -->

    <!-- div -->
    <div class="container">
    <div class="jumbotron">
        <h1 class="display-3">Nos Salariés</h1>

        <h2>Tableau des employés de l'entreprise</h2>

        

    <!-- debut PHP -->
        <?php 
        
        $requete = $pdoEntreprise->query("SELECT * FROM employes");// je selectionne tous les elements qui se trouvent dans ma table employes

        echo "
                <table class=\"table table-striped\">
                <thead>
                     <tr>
                         <th>ID</th>
                         <th>Prenom</th>
                         <th>Nom</th>
                         <th>Sexe</th>
                         <th>Service</th>
                         <th>Date d'embauche</th>
                         <th>Salaire</th>
                         <th>Modification</th>
                         <th>Supprimer</th>

                     </tr>
                </thead>
     
                <tbody>
                     
                ";
     
                while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { 
     
                     echo "<tr>";
                     echo "<td>" . $ligne['id_employes'] . "</td>";
                     echo "<td>" . $ligne['prenom'] . "</td>";
                     echo "<td>" . $ligne['nom'] . "</td>";
                     echo "<td>" . $ligne['sexe'] . "</td>";
                     echo "<td>" . $ligne['service'] . "</td>";
                     echo "<td>" . $ligne['date_embauche'] . "</td>";
                     echo "<td>" . $ligne['salaire'] . "</td>";
                     echo "<td><a class=\"btn btn-dark\" href=\"03-entreprise.php?id_employes=".$ligne['id_employes']. "\">Modif</a></td>";
                     echo "<td><a class=\"btn btn-dark\" href=\"#".$ligne['id_employes']. "\">Exit</a></td>";
                     
                    
              
                     echo "</tr>";
     
                }//fin de la boucle
     
                echo "
                </tbody>
                </table>
                ";//je ferme mon tableau

        
        
        
        ?>
        <!-- fin PHP -->

<h2>Ajouter un futur employés</h2>

<div class="col-12">
            <form action="#" method="POST" class="border p-2">

            <div class="mb-3">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" require>
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" require>
                <label for="sexe">Sexe</label>
                <input type="text" name="sexe" id="sexe" class="form-control" require>
                <label for="service">Service</label>
                <input type="text" name="service" id="service" class="form-control" require>
                <label for="date_embauche">Date d'embauche</label>
                <input type="date" name="date_embauche" id="date_embauche" class="form-control" require>
                <label for="salaire">Salaire</label>
                <input type="text" name="salaire" id="salaire" class="form-control" require>
                <button type="submit" class="btn btn-dark mt-2">Ajouter</button>
            </div>

        <!-- debut PHP -->
        
            <?php 

            //Le code fonctionne que lorsque qu'on rafraîchi la page (employe ajouté).
           
                if(!empty($_POST)){

                    $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
                    $_POST['nom'] = htmlspecialchars($_POST['nom']);
                    $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
                    $_POST['service'] = htmlspecialchars($_POST['service']);
                    $_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']);
                    $_POST['salaire'] = htmlspecialchars($_POST['salaire']);
                
                    $ajouter = $pdoEntreprise->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)");
        

                    $ajouter->execute( array(
                               
                        ':nom' => $_POST['prenom'],
                        ':prenom' => $_POST['nom'],
                        ':sexe' => $_POST['sexe'],
                        ':service' => $_POST['service'],
                        ':date_embauche' => $_POST['date_embauche'],
                        ':salaire' => $_POST['salaire'],
                
                     ));
                     
                     exit();
                   
                     
                }

                
            ?>
            <!-- fin PHP -->
    </div>
    </div>
    <!-- fin DIV -->

    


    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>