<?php 

/* Commentaire sur 
plusieur ligne */
// commentaire sur une ligne
#commentaire sur une ligne

echo 'Bonjour<br>';
print ' Je suis pressée que ce soit vendredi';

/* 
-Ces codes PHP permettent d'afficher du texte 
-echo et print sont plutot semblable mais dans le cours nous utiliserons  majoritairement echo
-chaque instruction se termine par un point virgule
- comme en JS le code peut être mis entre apostrophes (quotes) ou entre guillemets
*/

/* 
-D'autre instruction permettent d'afficher mais degugger un code :

- print_in
- var_dump

Il est possible  de faire du HTML dans une balise PHP => methode correcte

*/

echo "<h1>Bonjour, il fait beau aujourd'hui</h1>";
echo "Je suis pressée que les <strong>vacances</strong> arrivent."

?>

<h2><?php echo "Quelle météo splendide"; ?> ! </h2>
<p><?php echo "Nous sommes"; ?>Lundi</p>

<?php 

/* 
Le code que nous venons de faire est cependant moin propre (moin professionnelle )
car il nous fais sortir et rentrer plusieur fois dans le code PHP Ilfaut donc éviter cette façon de coder
Lorsque l'on regarde le code source de notre page nous remarquons comme on la vu dans le cours que nous n'y trouvons pas de PHP 
Si vous voyez une erreur apparaitre verifier bien le code que vous avez fermé les aspostrophes ou les guillements et que vous avez mis le point virgule en fin de ligne 
*/

$prenom = 'Fred'; //pour declarer une variable on utilisera dollar $

//AFFICHAGE CONTENU VARIABLE

echo "Bonjour $prenom <br>";
echo 'Comment vas-tu $prenom ?';
/* 
Lorsque l'on veut afficher le contenu d'une variable il faudra utiliser les guillements
Comme en JS on declare une variable afin de garder en memoire sa valeur
En langage php : on dira donc ici qu'on a declaré la variable prenom et qu'on lui a affecté la valeur Fred
Mais n'oublions pas qu'une variable peut varier
*/

$prenom = 'Justine';
echo "<p>$prenom est la meilleure formatrice</p>";

//attention a bien gardé la meme convention de nommage dans tout un site ici nous utiliserons le camelCase => monPrenom // monAge // jourDeLaSemaine
//On aurait pu choisir le serpent case => mon_prenom // mon_age // jour_de_la_semaine

/* 

Il existe les même types de variable que nous avons vu en JS

-string : chaine de caractere
- integer : entier
- booleen : booleen
- double (float en JS) : nombres décimaux


*/

$variable1 = "bla bla bla";
echo "$variable1 : " . gettype($variable1) . "<br>";
$variable2 = 123;
echo "$variable2 : " . gettype($variable2) . "<br>";
$variable3 = TRUE;
echo "$variable3 : " . gettype($variable3) . "<br>";
$variable4 = 42.5;
echo "$variable4 : " . gettype($variable4) . "<br>";

/* 

Ici le navigateur renvoie 1 pour TRUE et il renverra vide (correspond à 0) pour FALSE

*/

//La constante existe aussi en PHP c'est une fonction predéfinie et elle se declare de la façon suivante :

define("CAPITALE", "PARIS");
echo "<p>". CAPITALE ."</p>";

/* 

Par convention une constante se declare toujours en majuscule.
On défini d'abord le nom de la constante puis apres la virgule son contenu
Le contenu d'une constante ne peut pas varier
On utilisera majoritairement des variables

*/


//Il existe des constantes magiques :

echo __FILE__ . "<br>";
echo __LINE__ . "<br>";


/* 

la première renvoie le fichier dans lequel on se trouve et son emplacement
La seconde nous renvoie la ligne à laquelle le code a été demandé
Il en existe d'autre que vous pouvez découvrir sur la doc officielle de PHP

*/

/* 

En PHP la concatenation ce fait grâce aux points ou aux virgules Ils sont à peu prés la meme utilisateur 
sauf que print ne permet pas l'utilisation de la virgule donc on utilisera toujours le point dans le cours.

*/
?>
