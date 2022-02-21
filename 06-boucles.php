<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css -->

    <title>Le PHP - Les boucles</title>
</head>

<body>


    <div class="jumbotron">
        <h1 class="display-3">Les boucles</h1>
        <p class="lead">Les boucles struture itératives (qui se repéte) sont un moyen de faire repeter un morceau de code plusieurs fois. Une boucle est donc une répétition</p>
 
    </div>

    <main class="container">
        <section class="row">
            <div class="col-12">
                <h2 class="text-center">La boucle DO WHILE</h2>
                <p>C'est le même principe que la boucle <em>while</em>, la salle différence c'est que la condition est testé à la fin plutot qu'au début.</p>

                <?php
                 $i = 0;

                 do {
                     echo $i;
                 }while ($i > 0);
                
                //ici on execute une fois le code même si on ne rempli pas la condition de la l'ordre de la boucle do....while => la boucle s'éxécute puis rencontre une condition qu'elle ne remplit pas et elle s'arrête donc.
                ?>
            </div>

            <div class="col-12">
                <h2 class="text-center">La boucle WHILE</h2>
                <p>While (tant que) est une boucle qui va executer un morceaux de code tant que la condition est remplie. </p>

                <?php 
                
                $a = 0;// valeur initiale à 0

                while ($a < 5)//on boucle tant que notre variable est inférieur à 5
                {
                    echo "<p>Tour n° $a </p>";// on affiche $a à quel tour on se trouve
                    $a++;// on incrémente notre variable $a => ajoute
                }
                
                ?>

                <div class="col-12">
                    <h2>La boucle for</h2>
                    <p>Tout comme la boucle while, l'objectif de cette boucle est de répéter un morceau de code. Mais la structure sera différente.</p>

                    <?php
                    
                    for($b = 0; $b <= 15; $b++)// dans les parenthèse de la boucle for: trois iniatilze la variable = on decrit notre condition = on incremente ou decrementon la variable
                    {
                        echo "<p>Tour n° $b</p>";//on met le code que nous devons repeter
                    }
                    
                    ?>

                    <div class="col-12">

                        <h2>La boucle foreach</h2>
                        <p>La boucle foreach sert a parcourir un tableau array()... On la verra plus en detail dans le chapître dédié aux array</p>

                        <h2>Comment choisir la boucle approprier ?</h2>
                        <p>A force de les utiliser, il sera de plus en plus logique de choisir telle ou telle boucle pour telle ou telle situation. 
                            Mais on verra que les boucles ont de toute façon la même utilité : la répétition d'une portion de code.
                        </p>
                    </div>
                    
                
                </div>
            </div>
            
        </section>
     
    

    



    </main>



    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>