<?php include("head.php"); ?>
<?php

if (isset($_POST['sou'])) {
    session_start();

    $connexion = mysqli_connect("localhost", "root", "");
    if (!$connexion) {
        echo "Désolé, la connexion à localhost est impossible";
        exit;
    }
    if (!mysqli_select_db($connexion, 'gestionelection')) {
        echo "Désolé, l'accès à la base de données gestionelection est impossible";
        exit;
    }

  
    $result = mysqli_query($connexion, "SELECT MAX(ID_electeur) AS max_id FROM electeurs");
    $row = mysqli_fetch_assoc($result);
    $lastId = $row['max_id'];

    
    $id = $lastId + 1;

    $requete = "INSERT INTO electeurs (ID_electeur, commune, num_or, Nom_electeur, Prenom_electeur, CIN, sexe, Date_naissance, lieu_naissance, adresse, etat_civil, Niveau_scolaire, Profession,adresse_vote,adresse_BV,num_bv)
       VALUES ($id, '" . $_SESSION['commune'] . "', " . $_SESSION['num'] . ", '" . $_SESSION['nom'] . "', '" . $_SESSION['prenom'] . "', '" . $_SESSION['cin'] . "',
       '" . $_SESSION['sexe'] . "', '" . $_SESSION['date'] . "', '" . $_SESSION['lieu'] . "', '" . $_SESSION['adresse'] . "', '" . $_SESSION['etat'] . "', '" . $_SESSION['niveau'] . "', '" . $_SESSION['profession'] . "', '" .  $_SESSION['numbv'] . "', '" .  $_SESSION['ecole'] . "', '" .$_SESSION['adresse1']. "')";

    if (mysqli_query($connexion, $requete)) {
        echo "<script>alert('Nouvel electeur ajouté avec succès'); window.location.href = 'imprimer.php';</script>";
    } else {
        echo "<script>alert('Erreur lors de l\'ajout de l\'electeur')</script>" . mysqli_error($connexion);
    }
    mysqli_close($connexion);
}

?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Inscription</title>
    
        <style>
           
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
           
      
       
</style>
        
       
           
    </head>
    <body>
    
        <div class="menu">
            <a class="menu-item" href="inscription.php"><img class="icon" src="inscriptionim.png">Nouvelle Inscription</a>
            <a class="menu-item" href="Modsup.php"><img class="icon" src="modifsupp.png">Modification et Suppression</a>
           
            <a class="menu-item" href="Bvote.php"><img class="icon" src="desk.png">Bureaux de Vote</a>
            <a class="menu-item" href="imprimer.php"><img class="icon" src="printer.png">Imprimer</a>
            <a class="menu-item" href="Statistique.php"><img class="icon" src="stat.png">Statistique</a>
            <a class="menu-item" href="recherche.php"><img class="icon" src="rech.png">Rechercher</a>
        </div>
        
    </body>
       

       </html>
       
       

