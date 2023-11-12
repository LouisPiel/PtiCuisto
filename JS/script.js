function myFunction() {
    var boutton = document.getElementById("boutton");
    var x = document.getElementById("navbarNav");
    if (x.className === "collapse navbar-collapse d-flex justify-content-end topnav") {
      x.className += " responsive";
      boutton.className = "fa-solid fa-x fa-2xl";
    } else {
      x.className = "collapse navbar-collapse d-flex justify-content-end topnav";
      boutton.className = "fa-solid fa-bars fa-2xl";
    }
  }