<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Accueil</title>
</head>
<body>
    <!-- header -->
    <?php include ('header.php'); ?> 

    <main>
        <img src="../image-logo/image-acceuil.png" id="image-acceuil" title="image libre de droit"/>
        <div id="container">
            <div id="derniereRecettes">
                <h1>LES DERNIÈRES RECETTES</h1>
            </div>

            <div id="edito">
                <img src="../image-logo/Pticuisto.png" id="image-edito" title="image réaliser à l'aide d'une IA"/>
                <h2>Edito</h2>

                <p id="texte-edito">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ut luctus felis. Nullam sit amet arcu porta elit fermentum consectetur eget id libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac aliquet tortor. Donec ex diam, ullamcorper et ante ut, euismod vulputate odio. Curabitur luctus tellus velit, et efficitur metus tempor in. Mauris ac enim sollicitudin, varius leo sit amet, mollis lacus. 
                </p>
            </div>
        </div>
        <hr/>
    </main>
    <!-- footer -->
    <?php include ('footer.php'); ?> 
</body>
</html>