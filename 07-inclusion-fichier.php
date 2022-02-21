<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css -->

    <title>Le PHP - Inclure des fichiers</title>
</head>

<body>


<?php 

        echo "<p>On ouvre le fichier header.inc.php</p>";
        include('inc/header.inc.php');
        echo "<p>Fin de notre fichier header.inc.php</p>";

?>

<main class='container'>


<p>Nous avons inclus notre fichier header.inc.php qui contient le jumbotron grâce à la fonction PHP <code>include('')</code>
Cette fonction prendra comme seul argument le chemin de notre fichier</p>

<?php include_once('inc/coucou.inc.php');?>

<p><code>include_once</code>s'appuie sur include et à donc les mêmes actions a un différence  près : lorsque l'on utilise cette fonction, le fichier vidé ne peut être appelé qu'une seule fois dans la page.</p>

<h2>La proprieté require()</h2>

<?php require('inc/require.inc.php');?>
<?php require_once('inc/require_once.inc.php');?>

<h2>Différence entre include, require, include_once, require_once</h2>
<p>En français include signifira = plutôt inclue moi ce fichier et require signifira = fichier requis </p>
<p>S'il y a une erreur :</p>
<ol>
    <li><code>include()</code> fera une erreur mais poursuivra quand même l'éxécution du code </li>
    <li><code>require</code> fera une erreur et elle sera fatale : on arrête l'éxécution du code</li>
    <li><code>_once</code> fera l'erreur de son parent et il est présent pour s'assurer que le fichier n'est qu'une fois dans le code</li>
</ol>


    



</main>



    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>