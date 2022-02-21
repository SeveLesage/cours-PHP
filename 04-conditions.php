<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css -->

    <title>Le PHP - Les conditions et boucles </title>
</head>

<body>


    <div class="jumbotron">
        <h1 class="display-3">Les conditions et boucles</h1>
        <p class="lead">Les conditions sont un chapitre clé, comme dans les autres langages d'eprogrammation. Par exemple lorsque l'on crée un site web et que l'un de nos internaute veut se connecter à son espace, il rentrera son pseudo ainsi que son mot de passe.
            Il faudra alors exprimer la phase suivante en PHP SI (if) le pseudo est bon et le mdp aussi, tu peux rentrer SINON (else) tu restes sur la page avec un message d'erreur
        </p>

    </div>

    <main class="container">
     
    <section class="row">
        <div class="col-12">
            <h2 class="text-center">La conditions simple IF/ELSE</h2>
            <?php 
            
            $a = 10;
            $b = 5;
            $c = 2;

            if($a > $b){
                echo "<p>A est strictement superieur à B</p>";
            }else{
                echo "<p>Non, c'est B qui est strictement superieur à A</p>";
            }

            
            
            ?>

            <p>Nous avons déclarer 3 variables : a vaut 10, b vaut 5 et c vaut 2. Ici la condition est simple => on pose en fait la question "est la me^me chose en verifiant si a est strictement superieur ou inferieur à c"</p>
            <?php 
            
            if($a > $c){
                echo "<p>A est strictement superieur à C</p>";
            }else{
                echo "<p>A est strictement inferieur à C</p>";
            }
            
            
            ?>

            <h3 class="text-center">Condition simple avec AND</h3>

            <?php 
            
            if ($a > $b && $b > $c)
            {
                echo "<p>a est superieur à b et b superieur à c</p>";
            }else
            {
                echo "<p>L'une ou les deux conditions ne sont pas remplies.</p>";
            }

            ?>

            <p>Dans le code PHP d'au dessu. onverifie si a est superieur à b qui lui-même est superieur à C Dans le cas ou l'une ou les deux conditions s'avére fausse, le else sera executé Avec le signe <code>&&</code> (qui se dit AND ou et commerciel ou esperluette.) Il faut absolument que les deux conditions soient bonnes pour que l'évaluation du code retourne TRUE et que l'on puisse rentrer dans le if</p>

            <h3 class="text-center">Condition simple avec OR</h3>

            <?php
            
            if ($a == 9 || $b > $c)
            {
                echo "<p class=\"alert alert-success\">Au moin une des conditions est vrai, le code renvoie TRUE et le if s'éxécute donc.</p>";
            } else
            {
                echo "<p class=\"alert alert-success\">Aucune condition n'est vrai c'est donc moi qui m'execute</p>"; 
            }
            
            ?>

            <p>Cette fois-ci nous vérifion si a contient la valeur 9 OU si b est superieur à c. Il suffit que l'une des conditions soit vraie pour que le code renvoie TRUE et que le if s'execute. Bien sur, si les deux conditions sont bonnes c'est toujours le if qui s'éxécute.</p>

            <h3 class="text-center">Condition simple XOR</h3>

            <?php
            
            if ($a == 10 XOR $b == 6)
            {
                echo "<p class=\"alert alert-success\">Une seule est bonne, le code renvoie TRUE et on rentre dans le if</p>";
            }else
            {
                echo "<p class=\"alert alert-success\">Les deux conditions sont bonnes ou les deux sont mauvaises, c'est donc moi, le else, qui m'éxecute</p>";
            }
            
            ?>

            <p>Pour que le if s'éxécute lorsque l'on fait une condition avec XOR, il faut qu'une seule des conditions soit vraie pour que le code renvoie TRUE Si les deux conditions sont bonnes ou si les deux sont mauvaises alors on rentre dans le else</p>

            <h2 class="text-center">Condition complexe avec if / elseif / else</h2>

            <?php 
            
            if ($a == 8)
            {
                echo "<p class=\"alert alert-success\">A est egal à 8</p>";
            }elseif ($a != 10)
            {
                echo "<p class=\"alert alert-success\">A est different de 10</p>";
            }else
            {
                echo "<p class=\"alert alert-success\">Les autres solution etaitent fausse c'est donc moi qui m'execute";
            }
            
            
            ?>

            <p>Dans le if nous verifions si la variable $a est egal à 8 Dans le elseif on verifie si la variable $a contient une valeur differente de 10 
                Le else s'executeera car ses deux conditions ne sont pas bonnes, elles renvoient FALSE Ici nous avons mis un seul elseif mais comme en JS on peut en mettre autant que l'on veut </p>

                <h3 class="text-center">IF/ELSE contracter</h3>

                <?php 
                
                echo ($a == 10) ? "<p class=\"alert alert-success\">A est égal à 10</p>" : "<p class=\"alert alert-success\">A n'est pas égal à 10</p>";
                
                
                ?>

                <p>Dans la forme contracté (ternaire) du if else le if est remplacé par le point d'interrogation qui vient après la condition Le else est remplacé par les deux points (:)</p>

                <h3>Condition de comparaison</h3>

                <?php 
                
                $vara = 1;
                $varb = '1';

                if ($vara == $varb)
                {
                    echo "<p class=\"alert alert-success\">Il s'agit de la meme valeur !</p>";
                }else 
                {
                    echo "<p class=\"alert alert-success\">Il ne s'agit pas de la meme valeur</p>";
                }

                if ($vara === $varb)
                {
                    echo "<p class=\"alert alert-success\">Il s'agit de la meme valeur !</p>";
                }else 
                {
                    echo "<p class=\"alert alert-success\">Il ne s'agit pas de la meme valeur</p>";
                }
                
                
                ?>


                <p>Dans le premier if else, on verifie si la chaine de caractere et l'integer qui se trouvent dans vara et varb ont la même valeur. La condition est bonne, le code renvoie TRUE et le if s'éxécute</p>
                <p>Dans le deuxieme if else, nous verifions si vara et varb ont le mem type et le meme valeur La condition du if est fausse le code renvoie FALSE et c'est le else qui s'éxecute</p>

                <table class='table table-striped'>
                    <caption>Difference entre 1 egal, 2 egals et 3 egals</caption>
                    <th>
                        <tr>
                            <th>Operateur</th>
                            <th>Signification</th>
                        </tr>
                    </th>
                    <tbody>
                        <tr>
                            <td>=</td>
                            <td>1 egal permet  d'affecter une valeur à une variable</td>
                            
                        </tr>
                        <tr>
                            <td>==</td>
                            <td>2 egals permettent de faire  une comparaison de la valeur</td>
                         
                        </tr>
                        <tr>
                            <td>===</td>
                            <td>3 egals permettent de faire une comparaison de la valeur et du type</td>
                            
                        </tr>
                    </tbody>
                </table>


        </div>

        <div class="col-12">
            <h2 class="text-center">La condition Switch</h2>

            <?php 
            
            $monPays = "France";

            switch($monPays)
            {
                case 'Italie':
                echo "<p class=\"alert alert-success\">Vous etes Italien</p>";
                break;
                case 'Espagne':
                echo "<p class=\"alert alert-success\">Vous etes Espagnol</p>";
                break;
                case 'Uruguay':
                echo "<p class=\"alert alert-success\">Vous etes Uruguayen</p>";
                break;
                case 'Mali':
                echo "<p class=\"alert alert-success\">Vous etes Malien</p>";
                break;
                case 'France':
                echo "<p class=\"alert alert-success\">Vous etes français</p>";
                break;
                case 'Thailande':
                echo "<p class=\"alert alert-success\">Vous etes Thailandais</p>";
                break;
                default:
                echo "< class=\"alert alert-success\">Vous n'avez pas une nationalité connue dans notre liste de possibilités</p>";
                break;
            }
            
            
            ?>

            <p>Il faut être très vigilant lors d'une écriture d'une boucle swicth : il faut penser au case, aux deux points, au break, au default, etc.
                Dans le cas d'une switch les conditions complexes ne fonctionnent pas : il n'est pas possible de verifier si $a > $b par exemple.
            </p>

            <h2 class="text-center"></h2>
        </div>
    </section>



    </main>



    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>