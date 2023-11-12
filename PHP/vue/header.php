<?php
echo '<header>'; 
//Fenêtres modales
echo
'   <div id="modaleNom" class="modal" aria-modal="true" aria-labelledby="modal-heading">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1 id="modal-heading">Filtre nom</h1>
            <input name="filtre_nom" id="filtre_nom" class="filtre"></input>
            <button id="button_ajouter_nom">Ajouter</button>            
        </div>            
    </div>
    <div id="modaleCategorie" class="modal" aria-modal="true" aria-labelledby="modal-heading">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1 id="modal-heading">Filtre ingredient</h1>
            <select name="filtre_categorie" id="filtre_categorie" class="filtre">
                <option value="">---Choisir un ingrédient---</option>
                <option value="Entrée">Entrée</option>
                <option value="Plat principal">Plat principal</option>
                <option value="Dessert">Dessert</option>
            </select>
            <button id="button_ajouter_categorie">Ajouter</button>
        </div>        
    </div>
    <div id="modaleIngredient" class="modal" aria-modal="true" aria-labelledby="modal-heading">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1 id="modal-heading">Filtre Ingredient</h1>
            <input name="filtre_ingredient" id="filtre_ingredient" class="filtre"></input>
            <button id="button_ajouter_ingredient">Ajouter</button>
        </div>    
    </div>';
    /*
    <h2>Filtrer</h2>
        <form action = "<?php// print $_SERVER['PHP_SELF'];?>" method = "post">
    <p> Filtre <p>
        <input type="text" name="caractere">
    <p> Categorie <p>
        <select id="cat" name="categorie" size="3">
                <option value='ENTREE'>Entrée</option>
                <option value='PLAT'>Plat</option>
                <option value='DESSERT'>Dessert</option>
        </select>
    <p> Ingrédient <p>
        <input type="text" name="ingredient">
    <input type=submit name="filtre" value="Filtrer">
    </form>;*/

echo '  <nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand" href="#"> 
                <img src="../image-logo/Logo.png" height="80em" class="d-inline-block align-top" alt="" />
            </a>
            <div class="collapse navbar-collapse d-flex justify-content-end topnav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="index.php?action=accueil" class="nav-link">Accueil</a></li>
                    <li class="nav-item"><a href="index.php?action=listeRecettes" class="nav-link">Nos recettes</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filtres
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Catégories</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Titre</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Ingrédients</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="index.php?action=connexion" class="nav-link">Connexion</a></li>
                </ul>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <span class="fa-solid fa-bars fa-2xl" id="boutton"></span>
                </a>
            </div>                
        </nav>';

echo '</header>';
?>
<!--li class="nav-item"><a href="index.php?action=accueil&amp;id='.<?//$data['rec_id'] ?>." class="nav-link">Accueil</a></li>'-->
<!--li class="nav-item"><a href="accueil.php" class="nav-link">Accueil</a></li-->