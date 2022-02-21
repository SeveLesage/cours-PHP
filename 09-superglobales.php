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

    <title>Le PHP - Superglobales</title>
</head>

<body>


    <div class="jumbotron">
        <h1 class="display-3">Les superglobals</h1>
        <p class="lead">Les superglobales sont des variable array() interne et predefinie par PHP. Elles sont toujours disponible dans une page PHP quelque soi le contexte de cette page. 
            
        </p>

      
 
    </div>

    <main class="container">
<div class="row">
    <div class="col-12">
    <p>Ces superglobales permettent de renvoyer un certain nombre d'informations et elle s'ecrivent toujours en Majuscule et commence par un _ sauf la superglobale <code>$GLOBALS</code>.</p>

    <figure>
            <img src="img/tableau.png" alt="tableau superglobale">
        </figure>

        <?php 
        
        jeprint_r($_ENV);
        jeprint_r($GLOBALS);
        
        ?>
     
    

    
     </div>
     </div>

    </main>



    <!--  Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>