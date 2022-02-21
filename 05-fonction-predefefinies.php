<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css -->

    <title>Le PHP - Les fonctions predefinies</title>
</head>

<body>


    <div class="jumbotron">
        <h1 class="display-3">Les fonctions predefinies</h1>
        <p class="lead">Les fonction predefinies sont des morceaux de code permaettant d'automiser un traitement ou de donner un affichage particulier. PHP possede plusieurs mots clés et fonctions deja existantes dans le langage, nous pourrons les retrouver dans la doc officielle</p>

    </div>

    <main class="container">
     
    <div class="col-12">
        <h2 class="text-center">La fonction date</h2>
        <p>Lorsque vous voyez un mot clé en anglais (qui n'est pas le votre) suivi de parenthese c'est qu'il s'agit une fonction PHP prédéfinie</p>

      <?php 
      
       // echo "Date du jour :" date(d-m-Y);
       
      
      ?>
        
       
        
        

        <p>La fonction date permet donc d'afficher la date du jour avec les arguments suivant :</p>

        <ul>
            <li>d : day = jour</li>
            <li>m : month = mois</li>
            <li>y : year = année</li>
        </ul>

        <p>Le fait de mettre les arguments en minuscule ou en majuscule à une incidence sur le resultat : essayez ! argument, aussi appelé parametre est une information entrant dans la fonction</p>

        <h2>strlen()</h2>

        <?php 
        
        $phrase = "je n'est pas d'inspi !";
        echo strlen($phrase);
        
        ?>

        <p>strlen() est fonction predefinies permettant de retourner le nombre de caractere d'une string strlen= string length = longueur de chaîne de caracteres</p>
        <p>Nous lui fournissons en argument une chaine de caractere à analyser La valeur retourner est soit un integer (nombre entier) soit un booleen FALSE =></p>
        <p>Cas d'utilisation : Cela pourra être pratique quand nous souhaitons conna^^ître le nombre de caracteres dans un pseudo par exemple ou encore dans un mot de passe qui nous est transmis lors de l'inscription.</p>


        <h2 class="text-center">substr()</h2>L
        <p>orem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quibusdam, autem alias eligendi veritatis reprehenderit ipsam omnis quis ducimus modi voluptatum minus harum, laboriosam illo molestias quod ex qui quas.
        Ab facere quasi repellat dolore, optio rem porro dolor numquam quibusdam, cumque sit reiciendis pariatur id voluptas necessitatibus natus laborum possimus perspiciatis iure explicabo odit! Accusamus odio omnis harum? Ipsam?</p>

        <?php 
        
        $texte = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quibusdam, autem alias eligendi veritatis reprehenderit ipsam omnis quis ducimus modi voluptatum minus harum, laboriosam illo molestias quod ex qui quas.
        Ab facere quasi repellat dolore, optio rem porro dolor numquam quibusdam, cumque sit reiciendis pariatur id voluptas necessitatibus natus laborum possimus perspiciatis iure explicabo odit! Accusamus odio omnis harum? Ipsam?";
        echo substr($texte, 0, 20) . "<a href=\"#\">Lire la suite...</a>";
        ?>

        <p>La fonction prédéfinie substr() attend trois argument : </p>
        <ul>
            <li>La chaine de caractere que l'on souhaite couper</li>
            <li>La position de debut integer</li>
            <li>la position de fin integer</li>
        </ul>

        <p>Dans le cas présent, nous lui demandons d'afficher eulement les 20 premiere caractere.. Substr() est souvent utiliser sur le web dans le cas des phrases d'accroche surdes articles de presse.
            Pour ne pas couper en plein milieu d'un mot il existe d'autre fonction predefinies.
        </p>

        <h2 class="text-center">isset()</h2>

        <?php 
        
        $pseudo = "Jujupf93";
        if (isset($pseudo))
        {
            echo '<p class="alert alert-success">La variable $pseudo existe!</p>';
        }else
        {
            echo '<p class="alert alert-success">La variable $pseudo n\'existe pas !</p>';
        }
        
        
        ?>

        <p>La fonction predefinie isset() n'attend qu'un argument : la variable que l'on souhaite tester. Elle renvoie TRUE si la variable existe et FALSE dans le cas contraire</p>
    </div>

    



    </main>



    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>