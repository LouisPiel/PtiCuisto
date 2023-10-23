<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos recettes</title>
    <link rel="stylesheet" href="./Style/style.css">
</head>
<body>
    <!--Il faut que chaque filtre ajoute un tag qui limite la recherche-->
    <!--Fenêtres modales-->
    <div id="modaleNom" class="modal" aria-modal="true" aria-labelledby="modal-heading">
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
    </div>
    <section id="bandeau_filtres">
        <p>Filtres</p>
        <button id="button_filtre_nom" class="bt_filtre">Nom</button> 
        <button id="button_filtre_categorie" class="bt_filtre">Categorie</button> 
        <button id="button_filtre_ingredient" class="bt_filtre">Ingredients</button>   
    </section>
    <section id="resultats">

    </section>
    <script src="./Scripts/nos_recettes.js"></script>
</body>
</html>