<?php 
// 1- Require de init.inc.php
require_once('inc/init.inc.php');

//traitement du formulaire

if (!empty($_POST)) {
    if (empty($_POST['pseudo']) || empty($_POST['mdp'])) {//je verifie que pseudo et mdp contiennent des infos(bonne ou pas)
        $contenu .= "<div class=\"alert alert-warning\">Le pseudo et le mot de passe sont requis !</div>";
    }

    if (empty($contenu)) {//si la variable contenu est vide alors je n'ai pas d'erreur
        $resultat = $pdoBlog->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');

        $resultat->execute(array(
            'pseudo' => $_POST['pseudo'],
        ));//je selectionne dans la bdd le membre dont le pseudo correspond à celui du formulaire


        if ($resultat->rowCount() == 1) {//si le programme renvoie une ligne c'est que le membre et se pseudo existent
            $membre = $resultat->fetch(PDO::FETCH_ASSOC);
            debug($membre);

            if (password_verify($_POST['mdp'], $membre['mdp'])) {
                //passeword_verify prend deux argument le 1 est ce que l'on recupere dans le formulaire
                //le 2 on recupere dans le formulaire le second est le mdp hashé qui existe dans la BDD password_verify verifie que le premier correspond au deuxieme

                $_SESSION['membres'] = $membre; // on cree une session avec les infos de membre dans un tableau multidimensionnel
                header('location:profil.php');
                exit();
            } else {// si le mot de passe n'est pas bon
                $contenu .= "<div class=\"alert alert-danger\">Attention vous n'avez pas le bon mot de passe !</div>";
            }
        }else {// si le pseudo n'est pas
            $contenu .= "<div class=\"alert alert-danger\">Erreur sur le pseudo attention !</div>";
        }
    }
}


debug($_SESSION['membres']);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Connexion</title>
    <!-- BOOTSWATCH CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- cdn icone boost -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body>

    <div class="p-5 bg-primary">
        <div class="container">
            <h1 class="display-3 text-white">Connexion Blog</h1>
            <p class="lead text-white">Connectez-vous à notre site !</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
            <?php echo $contenu; ?>
                <form action="#" method="POST" class="p-5 my-2 border-primary">

                <div class="mb-3 row">

                    <div class="col">
                        <label for="pseudo">Pseudo *</label>
                        <input type="text" name="pseudo" id="pseudo" class="form-control" required>
                    </div>

                    <div class="col">
                         <label for="mdp">Mot de passe *</label>
                         <input type="password" name="mdp" id="mdp" class="form-control" required>
                    </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Se connecter</button>

                </form>

            </div>
        </div>
    </div>


    <!-- BOOTSWATCH JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>