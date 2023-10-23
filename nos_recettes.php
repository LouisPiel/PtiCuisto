<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos recettes</title>
    <script src="../Scripts/nos_recettes.js"></script>
</head>
<body>
    <!--Il faut que chaque filtre ajoute un tag qui limite la recherche-->
    <section id="bandeau_filtres">
        <p>Filtres</p>
        <div role="dialog" aria-modal="true" aria-labelledby="modal-heading">
            <button>Fermer</button>
            <h1 id="modal-heading">Filtre nom</h1>
            <input name="filtre_nom" id="filtre_nom" class="filtre"></input>
            <button id="button_ajouter_nom">Ajouter</button>            
        </div>
        <div role="dialog" aria-modal="true" aria-labelledby="modal-heading">
            <button>Fermer</button>
            <h1 id="modal-heading">Filtre ingredient</h1>
            <select name="filtre_ingredient" id="filtre_ingredient" class="filtre">
                <option value="">---Choisir un ingrédient---</option>
                <option value="Entrée">Entrée</option>
                <option value="Plat principal">Plat principal</option>
                <option value="Dessert">Dessert</option>
                <option value="Salade">Salade</option>
            </select>        
        </div>
        <div role="dialog" aria-modal="true" aria-labelledby="modal-heading">
            <button>Fermer</button>
            <h1 id="modal-heading">Filtre nom</h1>
            <input name="filtre_ingredient" id="filtre_ingredient" class="filtre"></input>
            <button id="button_ajouter_ingredient">Ajouter</button>   
        </div>


    </section>
    <section id="resultats">

    </section>
</body>
</html>