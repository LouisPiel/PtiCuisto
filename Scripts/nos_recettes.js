/*TO DO : Refaire tout ça pour que le site puisse THEORIQUEMENT être une seule page qui fonctionne juste avec du PHP
(ou un minimum de JS) et selon Modèle Vue Contrôleur*/
/*Modales peuvent être utilisées de partout sur le site*/


//Modales
var modaleNom = document.getElementById("modaleNom");
var modaleCateg = document.getElementById("modaleCategorie");
var modaleIngr = document.getElementById("modaleIngredient");

//Boutons de filtres
var btFiltreNom = document.getElementById("button_filtre_nom");
var btFiltreCateg = document.getElementById("button_filtre_categorie");
var btFiltreIngr = document.getElementById("button_filtre_ingredient");

//Boutons d'ajout de filtre
var btAjNom = document.getElementById("button_ajouter_nom");
var btAjCateg = document.getElementById("button_ajouter_categorie");
var btAjIngr = document.getElementById("button_ajouter_ingredient");

//Contenu des inputs et select des filtres
var filtreNom = document.getElementById("filtre_nom");
var filtreCateg = document.getElementById("filtre_categorie");
var filtreIngr = document.getElementById("filtre_ingredient");


// Croix (span) de fermeture des modales
var span1 = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];
var span3 = document.getElementsByClassName("close")[2];

// Ouvre les modales au clic 
btFiltreNom.onclick = function () {
    modaleNom.style.display = "block";
    console.log("modale ouverte");
}
btFiltreCateg.onclick = function () {
    modaleCateg.style.display = "block";
    console.log("modale ouverte");
}
btFiltreIngr.onclick = function () {
    modaleIngr.style.display = "block";
    console.log("modale ouverte");
}

// Ferme la modale au clic sur la croix
span1.onclick = function () {
    modaleNom.style.display = "none";
    console.log("modale fermée X");
}
span2.onclick = function () {
    modaleCateg.style.display = "none";
    console.log("modale fermée X");
}
span3.onclick = function () {
    modaleIngr.style.display = "none";
    console.log("modale fermée X");
}

// Ferme la modale si on clique en dehors de la feenêtre
window.onclick = function (event) {
    switch(event.target) {
        case modaleNom: 
            modaleNom.style.display = "none";
            console.log("modale fermée");
        break;
        case modaleCateg: 
            modaleCateg.style.display = "none";
            console.log("modale fermée");
        break;
        case modaleIngr: 
            modaleIngr.style.display = "none";
            console.log("modale fermée");
        break;
    }
}

btAjNom.addEventListener('click', function () {
    let inputNom = filtreNom.value;
    console.log("Filtre nom : " + inputNom);
    filtreNom.textContent="";
    modaleNom.style.display = "none";
});

btAjCateg.addEventListener('click', function () {
    let selectCateg = filtreCateg.value;
    console.log("Filtre catégorie : " + selectCateg);
    modaleCateg.style.display = "none";
});

btAjIngr.addEventListener('click', function () {
    let inputIngr = filtreIngr.value;
    console.log("Filtre ingrédient : " + inputIngr);
    filtreIngr.textContent="";
    modaleIngr.style.display = "none";
});