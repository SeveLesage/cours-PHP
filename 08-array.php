<?php require('inc/functions.php');



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

    <title>Le PHP - Les Array</title>
</head>

<body>


    <div class="jumbotron">
        <h1 class="display-3">Les array</h1>
        <p class="lead">Les tableaux appelés array() en js comme en php sont extrement importants car il permettent de conserv er en memoire plusieur valeur</p>
 
    </div>

    <main class="container">

    <h2>A quoi ça sert ?</h2>
    <p>On va pouvoir dans un array concerver plusieur valeurs, c'est la la difference majeure avec une variable</p>

    <h3>Exemple avec un tableaux predefinie</h3>
    <?php
    
    $prenom = "Nicolas, Juliette, Jasmine";
    echo "Bonjour $prenom";
    /*Dand un tableau j'enregistre plusieurs valeurs*/
    
    $listeprenoms = array("Gregoire", "Sidonie", "Eleonore");
    
    jeprint_r($listeprenoms);
    jevar_dump($listeprenoms);

    echo "Bonjour " .$listeprenoms[2];
    echo "<br>";
    echo "Bonjour " .$listeprenoms[0];


    
    ?>

    <h2>Exemple avec un tableaux non predefinie</h2>

    <?php 
    
    $listepays[] = 'France';
    $listepays[] = 'Angleterre';
    $listepays[] = 'Espagne';
    $listepays[] = 'Portugal';

    jevar_dump($listepays);

    echo "<p>J'habite en $listepays[2]</p>";
    echo implode('<br>', $listepays);
    
    
    ?>

    <p><code>implode</code>permet d'extraire les valeurs d'un tableau array() et cette fonctions predefinie attend deux arguments 
le premier est le separateur et le deuxieme est l'array que nous voulons explorer</p>

<h2>Parcourir les tableaux gra^ce au boucle</h2>

<h3>La boucle for</h3>

<?php 

$listefourniture = array('stylo', 'crayon de couleur', 'feutres', 'crayon de papier', 'surligneurs');

jeprint_r($listefourniture);

for($i = 0; $i < sizeof($listefourniture); $i++) {
    echo $listefourniture[$i] . "<br>";
}

?>

<p>La fonction <code>sizeof</code> ou encore l'autre fonction predefinie <code>count</code> permettent de connaitre le nombre de clé ou d'indices qui se trouvent dans un tableau.
Dans cette exemple sizeof() a compté 5 indices dans le tableau et celi-la est donc pacouru 5 fois</p>

<p>Ici notre variable $i représente la clé ou l'indice du tableau => au premier tour $i représente l'indice 0 stylo et il va évoluer pour representer les differents indices de notre tableau. 
    C'est la raison pour laquelle on devra entre crochet notre $i apres notre $listefourniture ! on explique au programme qu'on veut afficher l'element correspondant à l'indice indiqué (o 1 2 3 4 compte a l'interieur des tableaux)
</p>

<p>Mais une autre boucle est encore plus adapté à la lectue de tableau : c'est la boucle <code>foreach</code> car on sera pas obligé de lui fournir un numéro</p>
<h3>La boucle foreach</h3>
<ul>
<?php 

foreach($listefourniture as $indiceTableau => $objetTableau) {
    echo "<li>$indiceTableau - $objetTableau</li>";
}

?>
</ul>

<p>Dans la boucle foreach (et dans le echo) les element que nous avons nommés $indiceTableau et $objetTableau auraient tres bien pu s'appeler $x et $y ou encore $piscine et $chlore : leur nom n'a pas d'importance
    L'ordre represente en fait la maniere dont le tableau va être parouru : 1ere variable pour la colonne indice ou clé, 2eme variable pour la colonne valeur.
</p>

<p>Le mot clé <code>as</code> et le symbole <code>=></code> sont quant à eux predefinie dans le langage PHP, il faut les respecter, c'est une régle de syntaxe lorsque l'on utilise une boucle <code>foreach</code>.
De plus cette boucle et la plus pratique pour les tableaux car elles s'arrête toute seule quand elle a fini de parcourir le tableau</p>

<h2>Les tableaux associatif</h2>
<p>Il est possible de choisir les clés d'un array() plutô^t que d'avoir une numerotation classique, nous appelerons ça un tableau associatif</p>

<?php 

$listecouleurs = ['j' => 'jaune', 'b' => 'bleu', 'v' => 'vert'];
jeprint_r($listecouleurs);
echo "Ma couleur prefere est le" . $listecouleurs['j'];

?>

<p>Désormais avec un tableau nous utiliserons les crochets avec l'indice que nous avons defini, si cet indice est une string, il faudra mettre des apostrophes ou guillemets</p>

<h2>Les tableaux multidimentionnel</h2>
<p>Il est possible de créer des tableaux à l'interieur d'autre tableaux grâce a une imbrication : c'est alors un tableau multidimentionnel</p>

<?php 

$tabMulti = array(
    0 => array('prénom' => 'Justine', 'nom' => 'perinel'),
    1 => array('prenom' => 'léa', 'nom' => 'Dolo'),
    2 => array('prenom' => 'francois', 'nom' => 'holland'),
);

jeprint_r($tabMulti);

echo "Bonjour Madame " . $tabMulti[1]['nom'];

?>

<p>Ici on a pu afficher des informations venant d'un tableau muldidimentionnel grâce aux crochet : dans un premier couple de crochets on va mettre l'indice du tableau qui entoure toutes les infos dans cet exemple l'indice est [1] puis dans le deuxieme couple de crochet on vient mettre l'indice de l'info recherchée ici l'indice était ['nom']</p>
<section class="row">
       
     
    

    



    </main>



    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>