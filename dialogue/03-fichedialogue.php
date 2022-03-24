<?php require("../inc/functions.php") ?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Le PHP - Mise à jour de donnée</title>
</head>

<body>

    <?php

    $pdoDialogue = new PDO( /* PDO est un objet qui représente la connexion entre une page en PHP et une BDD */
        'mysql:host=localhost;dbname=dialogue', /* Dans le premier argument, le host et nom de la BDD */
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
        <h1 class="display-3">Mise à jour d'un commentaire</h1>
        <p class="lead">Grâce à la superglobales $_GET, on va pouvoir récupèrer des informations de la BDD et les mettre à jour </p>

    </div>





    <main class="container">
        <!-- 1ere section -->
        <section class="row">

            <div>
                <?php  /* Réception des informations d'un commentaire de la BDD*/


                /* "=>" Cette flèche signifie que ce qui vient avant et ce qui après correspondant */
                /* "->" Cette flèche signigie que l'on s'appuie sur ce qui se trouve avant pour éxécuter quelque chose  */

                if (isset($_GET['id_commentaire'])) {  /* On vérifie que l'id du commentaire existe dans otre BDD si il y est alors on éxécute le code ci-dessous */
                    $result = $pdoDialogue->prepare("SELECT * FROM commentaire WHERE id_commentaire= :id_commentaire");

                    $result->execute(array(
                        ':id_commentaire' => $_GET['id_commentaire'] /* on associe :id_commentaire ) l'id récupéré dans le lien de la page */

                    ));

                    if ($result->rowCount() == 0) { /* Si l'id Commentaire n'existe pas alors on exécute le code ci-dessous */
                        header('location:02-dialogue.php'); /* On redirige vers la page de départ */
                        exit(); /* On arrête le script car il ne correspond à rien */
                    }

                    $fiche = $result->fetch(PDO::FETCH_ASSOC);
                } else { /* Si j'arrive sur la page sans rien dans l'URL */

                    header('location:02-dialogue.php'); /* On redirige vers la page de départ */
                    exit(); /* On arrête le script car il ne correspond à rien */
                }


                ?>


            </div>




            





      
            <div class="col-12 col-md-6">
                <h3>Correction </h3>

                <div class="card">
                    <div class="card-header">
                        ID du commentaire : <?php echo $fiche['id_commentaire'] ?>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Pseudo : <?php echo $fiche['pseudo'] ?> </h4>
                        <p class="card-text">Message : <?php echo $fiche['message'] ?> </p>
                    </div>
                    <div class="card-footer text-muted">
                        Date d'embauche ou de mise à jour : <?php echo date('d/m/y', strtotime($fiche['date_enregistrement'])) ?>
                    </div>
                </div>

            </div>

<div class="col-12 col-md-6">


<h2>Mise à jour du commentaire</h2>


<form action="#" method="POST">

<div class="mb-3">
<label for="pseudo">Pseudo</label>
<input type="text" name="pseudo" id="pseudo" class="form-control" value=" <?php echo $fiche['pseudo'];?>">

</div>

<div class="mb-3">
<label for="message">Pseudo</label>
<input type="text" name="message" id="message" class="form-control" value=" <?php echo $fiche['message'];?>">

<button type="submit" name="submit" class="bth btn-primary">Mettre à jour </button>

</form>


<?php 

/* traitement de la mise à jour du commentaire */
if(!empty($_POST)){// je vérifie que mon formulaire n'est pas vide (not empty)

    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);

    $_POST['message'] = htmlspecialchars($_POST['message']);// grâce à ces instructions, je vérifié qu'on ne m'injecte pas de SQL ou du JS et j'évite les failles

    $resultat = $pdoDialogue->prepare("UPDATE commentaire SET pseudo = :pseudo, message= :message WHERE id_commentaire = :id_commentaire");
     $resultat->execute(array(
':id_commentaire'=> $_GET['id_commentaire'],
':pseudo'=>$_POST['pseudo'],
':message'=>$_POST['message']

     ));

     header('location:02-dialogue.php');
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