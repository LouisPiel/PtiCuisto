var modaleNom = document.getElementById("modaleNom");
var modaleCategorie = document.getElementById("modaleCategorie");
var modaleIngredient = document.getElementById("modaleIngredient");


var addNom = document.getElementById("button_ajouter_nom");
var addIngr = document.getElementById("button_ajouter_ingredient");

var filtreNom = document.getElementById("filtre_nom");
var filtreCategorie = document.getElementById("filtre_categorie");
var filtreIngredient = document.getElementById("filtre_ingredient");


// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];
var span3 = document.getElementsByClassName("close")[2];

// When the user clicks the button, open the modal 
btn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

addNom.addEventListener('click', function () {
    let inputNom = filtreNom.textContent;
});