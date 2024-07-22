<?php include("head.php");?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenue</title>
    
        <style>
            body{background-color:#cfe7f6;}
            .menu {
                width: 350px;
                margin-top: 30px;
                margin-left: 16px;
                border: solid;
                border-radius: 20px;
                background-color: #dbeaff;
                border-color: #c3ddff;
                padding: 10px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
                float: left;
            }
            
            .menu-item {
                display: flex;
                text-decoration: none;
                color: black;
                font-weight: bold;
                padding: 10px 20px;
                margin-bottom: 10px;
                border-radius: 10px;
                transition: background-color 0.3s ease;
            }
            
            .menu-item:hover {
                background-color: #edf4ff;
            }
            
            .icon {
                width: 30px;
                height: 22px;
                vertical-align: middle;
                margin-right: 10px;
            }
            .photo {
                margin-top: 30px;
                text-align: center;
            }
            
            .photo img {
                width: 500px; height:290px;
            }
            .citation{font-style:italic;
                      font-weight:bold;
                    color:#3a4761;}
            
           
        </style>
    </head>
    <body>
        <div class="menu">
            <a class="menu-item" href="inscription.php"><img class="icon" src="inscriptionim.png">Nouvelle Inscription</a>
            <a class="menu-item" href="Modsup.php"><img class="icon" src="modifsupp.png">Gestion des electeurs</a>
            
            <a class="menu-item" href="Bvote.php"><img class="icon" src="desk.png">Bureaux de Vote</a>
            <a class="menu-item" href="Statistique.php"><img class="icon" src="stat.png">Statistique</a>
            <a class="menu-item" href="recherche.php"><img class="icon" src="rech.png">Rechercher</a>
            <a class="menu-item" href="deconnexion.php"><img class="icon" src="logout.png">Déconnexion</a>

        </div>
        
        <div class="photo">
            <img src="voter.jpg" alt="Your Photo">
        </div>
        
            <span class="citation">   « Lorsque nous demandons où est la liberté,<br>
                    on nous montre dans nos mains nos bulletins de vote. »</span>
        
    </body>
</html>
