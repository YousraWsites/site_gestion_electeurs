<?php include("head.php");?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Rechercher </title>
        <meta charset="UTF-8">
        <style type="text/css">
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
            } .icon {
                width: 30px;
                height: 22px;
                vertical-align: middle;
                margin-right: 10px;
            }
           
            .ins {
            
            width: 500px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-top: 120px;
            margin-left:555px;
        }
        .ins td {
            padding: 5px;align:center;
        }
        .ins input[type="submit"],
        .ins input[type="reset"] {
           
            background-color: #417ccd;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            height: 28px;width:80px;
            text-align: center; /* Centrer le texte */
        }

        .ins input[type="submit"]:hover,
        .ins input[type="reset"]:hover {
            background-color: #dbeaff;
        }
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
        
        <div class="ins">
      								
<form method="POST"  action="recherche1.php">   
<table>	
<tr>														
  <td><b>Saisir la CIN de l'electeur :</b></td><td>  <input type="text" name="CIN2" size="25"></td>
</tr>
<tr>
  <td colspan='2'><center><input type="submit" value="chercher" name="chercher">&nbsp;&nbsp;&nbsp;
  <input type="reset" value="Retablir" name="B2"></center></td>
 </tr>
</table>
</form>

    </div>
        

</body>
</html>