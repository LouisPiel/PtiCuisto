<?php
echo '<header>';

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