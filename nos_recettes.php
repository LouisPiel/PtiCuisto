<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos recettes</title>
    <script src="../Scripts/nos_recettes.js"></script>
    <style>
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
    </style>
</head>
<body>
    <!--Il faut que chaque filtre ajoute un tag qui limite la recherche-->
    <!--Fenêtres modales-->
    <div id="modaleNom" class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-heading">
        <span class="close">&times;</span>
        <h1 id="modal-heading">Filtre nom</h1>
        <input name="filtre_nom" id="filtre_nom" class="filtre"></input>
        <button id="button_ajouter_nom">Ajouter</button>            
    </div>
    <div id="modaleCategorie" class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-heading">
        <span class="close">&times;</span>
        <h1 id="modal-heading">Filtre ingredient</h1>
        <select name="filtre_ingredient" id="filtre_ingredient" class="filtre">
            <option value="">---Choisir un ingrédient---</option>
            <option value="Entrée">Entrée</option>
            <option value="Plat principal">Plat principal</option>
            <option value="Dessert">Dessert</option>
            <option value="Salade">Salade</option>
        </select>        
    </div>
    <div id="modaleIngredient" class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-heading">
        <span class="close">&times;</span>
        <h1 id="modal-heading">Filtre nom</h1>
        <input name="filtre_ingredient" id="filtre_ingredient" class="filtre"></input>
        <button id="button_ajouter_ingredient">Ajouter</button>   
    </div>
    <section id="bandeau_filtres">
        <p>Filtres</p>
        <button id="button_filtre_nom">Nom</button> 
        <button id="button_filtre_categorie">Categorie</button> 
        <button id="button_filtre_ingredient">Ingredients</button>   
    </section>
    <section id="resultats">

    </section>
</body>
</html>