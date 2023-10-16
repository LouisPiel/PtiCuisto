<?php
echo '<header>';

echo '   <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"> 
                <img src="../image-logo/Logo.png" width="30" height="30" class="d-inline-block align-top" alt="" />
            </a>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="index.php" class="nav-link">Accueil</a></li>
                    <li class="nav-item"><a href="nosRecettes.php" class="nav-link">Nos recettes</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="connexion.php" class="nav-link">Connexion</a></li>
                </ul>
            </div>
         </nav>';

echo '</header>';
?>