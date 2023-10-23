function myFunction() {
    var x = document.getElementById("navbarNav");
    if (x.className === "collapse navbar-collapse d-flex justify-content-end topnav") {
      x.className += " responsive";
    } else {
      x.className = "collapse navbar-collapse d-flex justify-content-end topnav";
    }
  }