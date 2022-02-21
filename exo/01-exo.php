<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css -->

    <title>PHP 01 EXO </title>
</head>

<body>


    <div class="jumbotron">
        <h1 class="display-3">Exo 1</h1>
        

    </div>

    <main class="container">
     
    <section class="row">
        <div class="col-12">
            <h2 class="text-center">Mini exo 1</h2>
            <p>Afficher la date d'aujourd'hui sous le format jj/mm/aaaa puis en anglais, la date complet</p>

            <?php 

            $date = date("d/m/y");
            echo "<p class=\"alert alert-success\">$date</p>";

            echo date("<p class=\"alert alert-success\">" .'l jS F Y' . "</p>");
              
            ?>

        </div>


        <div class="col-12">
            <h2 class="text-center">Mini exo 2</h2>
            <p>Afficher la devise de la france : "Liberté, Egalité, Fraternité"</p>
        </div>

        <?php
         
            echo "<p class=\"alert alert-success\">Liberté, Egalité, Fraternité</p>";
        ?>

<div class="col-12">
            <h2 class="text-center">Mini exo 3</h2>
            <p>Calcul de la TVA avec une fonction</p>
            <?php 
            
            //declarationde la fonction
            function calculTva()
            {
                return 100*1.2;
            }

            // execution de notre fonction

                echo calculTva();
            
            
            ?>

            <p>Faites un formulaire dans le quel on recuperer le prix d'un objet : si le prix est superieur à 100€ => si le le prix est inferieur à 100€, remise de 5% puis donner le prix net.</p>

            <!-- <form action="#" method="GET">
                <label for="prix">Combien avez vous payé votre objet ?</label>
                <input type="text" name="prix" id="prix" class="form-control">
                <input type="submit" name="submit" class="btn btn-success mt-1">
            </form> -->

            <?php
            
            if(isset ($_GET['submit'])) {

                $prix = $_GET ['prix'];
                $discount1 = 0.05;
                $discount2 = 0.1;
                $cinqpourcent = $prix * $discount1;
                $dixpourcent = $prix * $discount2;
                $prixfinaldix = $prix-$dixpourcent;
                $prixfinalcinq = $prix-$cinqpourcent;

                if($prix > 100) {
                    echo "<p class=\"alert alert-success\">Vous avez une remise de 10%, votre objet vaut donc $dixpourcent €, votre objet vaut donc $prixfinaldix €</p>";
                }else{
                    echo "<p class=\"alert alert-success\">Vous avez une remise de 5%, votre objet vaut donc $cinqpourcent €, votre objet vaut donc $prixfinalcinq €</p>";
                }
            }

            ?>

            <h2 class="text-center">Mini exo 4</h2>
            <p>Si vous achetez un mac à plus de 1000€ dans la boutique de Hols, la remise est de 15%, pour un mac de moin de 1000€, la remise est de 10%. Si vous achetez un livre, la remise est de 5% pour tous les autres articles, la remise est de 2%</p>


            <form action="#" method="GET">
                <label for="objet">Objet achetés</label>
                <input type="text" name="objet" id="objet" placehorder="mac, livre ou autre" class="form-control">
                <label for="prix">Prix de l'objet</label>
                <input type="text" name="prix" id="prix" class="form-control" placeholder="prix de l'objet">
                <input type="submit" name="submit" class="btn btn-success mt-1">
            </form>

            <?php 
            
            

            //on verifie le formulaire est soumis

            if(isset ($_GET['submit'])) {
                //on recupere les donnée du formulaire dans des variables

                $objet = $_GET['objet'];
                $prix = $_GET['prix'];
                //10% => 1-(10/100) = 0.9
                //Pour la remise le calcule est le precedent => on remplace 10 par le pourcentage que l'on peut obtenir
                $pf15 = 0.85 * $prix;
                $pf10 = 0.9 * $prix;
                $pf5 = 0.95 * $prix;
                $pf2 = 0.98 * $prix;

                if($objet == 'mac'){
                    if($prix > 1000){//dans mac si prix superieur à 1000 => remise de 15%
                        echo "<p>Vous avez acheté un $objet dont la valeur est de $prix, vous bénéficiez d'une remise de 15%, le prix final est donc de $pf15 €.</p>";
                    }else {//dans mac si prix inferieur a 1000 remise de 10%
                        echo "<p>Vous avez acheté un $objet dont la valeur est de $prix, vous bénéficiez d'une remise de 10%, le prix final est donc de $pf10 €.</p>";
                    }
                } elseif ($objet == 'livre'){//dans livre remise de 5%
                    echo "<p>Vous avez acheté un $objet dont la valeur est de $prix, vous bénéficiez d'une remise de 5%, le prix final est donc de $pf5 €.</p>";
                }else{//dans autre objet remise 2%
                    echo "<p>Vous avez acheté un $objet dont la valeur est de $prix, vous bénéficiez d'une remise de 2%, le prix final est donc de $pf2 €.</p>";
                }
            }
            
            ?>

                <h3>Exo 5</h3>
                    <p>Afficher dans un select les 31 jours d'un mois grâce a une boucle for en php</p>
                
                    <select name='jour' id='jour'>
                <!-- mettre le code php dans le select pour l'afficher à l'interieur du select -->
                    
                    <?php // boucle 31 jour du mois 


                    for ($i = 1; $i <= 31; $i++)
                    {
                        echo "<option value=\"$i\">$i</option>";
                    }
                    
                    
                    ?>
                      </select>
        </div>
    </section>




    </main>



    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>