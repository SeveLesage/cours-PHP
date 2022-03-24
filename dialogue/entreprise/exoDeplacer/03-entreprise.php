<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->

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
    <title>BACK OFFICE ENTREPRISE</title>
</head>

<body>

    <?php

    $pdoEntreprise = new PDO( /* PDO est un objet qui représente la connexion entre une page en PHP et une BDD */
        'mysql:host=localhost;dbname=entreprise', /* Dans le premier argument, le host et nom de la BDD */
        'root', /* Dans le deuxième argument (ici) l'identifiant PHPmyAdmin */
        '', /* Dans le troisième argument (ici) le mdp PHPmyAdmin */
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            /* Ici on précise comment on veut que les erreurs soient gérées et le jeu de caractères utilisé */
        )
    );






    ?>


    <!-- Jumbotron -->
    <div class="p-5 bg-light">
        <h1 class="display-3">Employé + nom de famille de l'employé</h1>
     

    </div>





    <main class="container">
        <!-- 1ere section -->
        <section class="row">


            <div>
                <?php  /* Réception des informations d'un commentaire de la BDD*/


                /* "=>" Cette flèche signifie que ce qui vient avant et ce qui après correspondant */
                /* "->" Cette flèche signigie que l'on s'appuie sur ce qui se trouve avant pour éxécuter quelque chose  */

                if (isset($_GET['id_employes'])) {  /* On vérifie que l'id du commentaire existe dans otre BDD si il y est alors on éxécute le code ci-dessous */
                    $result = $pdoEntreprise->prepare("SELECT * FROM employes WHERE id_employes= :id_employes");

                    $result->execute(array(
                        ':id_employes' => $_GET['id_employes'] /* on associe :id_commentaire ) l'id récupéré dans le lien de la page */

                    ));

                    if ($result->rowCount() == 0) {
                        header('location:02-entreprise.php'); 
                        exit(); 
                    }

                    $fiche = $result->fetch(PDO::FETCH_ASSOC);
                } else {

                    header('location:02-entreprise.php'); 
                    exit(); 
                }


                ?>


            </div>

      
            <div class="col-12 col-md-6">
             
            <h2>Récapitulatif de l'employés</h2>

                <div class="card">
                    <div class="card-header">
                        ID : <?php echo $fiche['id_employes'] ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Nom : <?php echo $fiche['nom'] ?> </p>
                        <p class="card-text">Prenom : <?php echo $fiche['prenom'] ?> </p>
                        <p class="card-text">Sexe : <?php echo $fiche['sexe'] ?> </p>
                        <p class="card-text">Service : <?php echo $fiche['service'] ?> </p>
                        <p class="card-text">Date d'embauche : <?php echo $fiche['date_embauche'] ?> </p>
                        <p class="card-text">Salaire : <?php echo $fiche['salaire'] ?> </p>
                    </div>
                </div>

            </div>

<div class="col-12 col-md-6">


<h2>Mise à jour de l'employé</h2>

    <div>
                <form action="#" method="POST">

                <form action="#" method="POST" class="border p-2">

                <div class="mb-3">
                    <label for="pseudo">Prenom</label>
                    <input type="text" placeholder="prenom" name="prenom" id="prenom" class="form-control" value="<?php echo $fiche['prenom']; ?>">
                </div>

                <div class="mb-3">
                    <label for="message">Nom</label>
                    <input type="text" placeholder="nom" name="nom" id="nom" class="form-control" value="<?php echo $fiche['nom']; ?>">
                </div>

                <div class="mb-3">
                    <label for="message">Sexe</label>
                    <input type="text" placeholder="sexe" name="sexe" id="sexe" class="form-control" value="<?php echo $fiche['sexe']; ?>">
                </div>

                <div class="mb-3">
                    <label for="message">Service</label>
                    <input type="text" placeholder="service" name="service" id="service" class="form-control" value="<?php echo $fiche['service']; ?>">
                </div>

                <div class="mb-3">
                    <label for="message">Date d'embauche</label>
                    <input type="date" placeholder="date_embauche" name="date_embauche" id="date_embauche" class="form-control" value="<?php echo $fiche['date_embauche']; ?>">
                </div>

                <div class="mb-3">
                    <label for="message">Salaire</label>
                    <input type="text" placeholder="salaire" name="prenom" id="salaire" class="form-control" value="<?php echo $fiche['salaire']; ?>">
                </div>

                <button type="submit" class="btn btn-dark m-2" name="submit" id="submit">Modifier</button>

                </form>


                </form>
        </div>

<?php 

   if(!empty($_POST)){// je vérifie que mon formulaire n'est pas vide (not empty)

    $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
    $_POST['nom'] = htmlspecialchars($_POST['nom']);// grâce à ces instructions, je vérifié qu'on ne m'injecte pas de SQL ou du JS et j'évite les failles
    $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
    $_POST['service'] = htmlspecialchars($_POST['service']);
    $_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']);
    $_POST['salaire'] = htmlspecialchars($_POST['salaire']);


    $miseAjour = $pdoEntreprise->prepare("UPDATE employes SET prenom = :prenom, nom = :nom, sexe = :sexe, service = :service, date_embauche= :date_embauche, salaire = :salaire WHERE id_employes = :id_employes");
    
    
    $miseAjour->execute(array(

            ':id_employes'=> $_GET['id_employes'],
            ':prenom'=>$_POST['prenom'],
            ':nom'=>$_POST['nom'],
            ':sexe'=>$_POST['sexe'],
            ':service'=>$_POST['service'],
            ':date_embauche'=>$_POST['date_embauche'],
            ':salaire'=>$_POST['salaire'],

    ));
    header('location:02-entreprise.php');
     exit();
    }

     

 

?>



</div>




        </section>

    </main>







    <!-- fin du code + js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>