function myFunction() {
  var x = document.getElementById("navbarNav");
  var y = document.getElementById("boutonBurguer")
  if (x.className === "collapse navbar-collapse d-flex flex-row-reverse topnav") {
    x.className += " responsive";
    y.className = "fa-solid fa-x fa-2xl";
  } else {
    x.className = "collapse navbar-collapse d-flex flex-row-reverse topnav";
    y.className = "fa-solid fa-bars fa-2xl";
  }
}