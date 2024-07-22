<?php include("head.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            margin: 0 auto;
            max-width: 1200px;
        }
        
        .acc {
          margin-top:20px;
            margin-left: 940px;
            display: inline-block;
            padding: 5px 10px;
            background-color: #c3ddff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        
        .t9 {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th{
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
            background-color: #c3ddff;
            color: #fff;
        }
        .td9 {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
        
       
        
        .tr9:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .edit-link, .delete-link {
            display: inline-block;
            padding: 5px;
        }
        
        .edit-link img, .delete-link img {
            width: 20px;
            height: 20px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="acceuil.php" class="acc">Retourner à la page d'accueil</a>
        <table class='t9'>
            <tr class='tr9'>
                <th >N°</th>
                <th>CIN</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Sexe</th>
                <th>Commune</th>
                <th>Niveau scolaire</th>
                <th>Profession</th>
                <th>Adresse</th>
                <th>Lieu de naissance</th>
                <th>État civil</th>
                <th>Action</th>
            </tr>
            <?php
            $connexion = mysqli_connect("localhost", "root", "");
            if (!$connexion) {
                echo "Désolé, la connexion à localhost est impossible";
                exit;
            }
            if (!mysqli_select_db($connexion, 'gestionelection')) {
                echo "Désolé, l'accès à la base de données gestionelection est impossible";
                exit;
            }
            $requete = mysqli_query($connexion, "SELECT * FROM electeurs");
            while ($ligne = mysqli_fetch_assoc($requete)) {
                $_SESSION['n'] = $ligne['num_or'];
                $_SESSION['c'] = $ligne['CIN'];
                $_SESSION['no'] = $ligne['Nom_electeur'];
                $_SESSION['po'] = $ligne['Prenom_electeur'];
                $_SESSION['co'] = $ligne['commune'];
                $_SESSION['ni'] = $ligne['Niveau_scolaire'];
                $_SESSION['pro'] = $ligne['Profession'];
                $_SESSION['ad'] = $ligne['adresse'];
                $_SESSION['li'] = $ligne['lieu_naissance'];
                $_SESSION['e'] = $ligne['etat_civil'];
                $_SESSION['s'] = $ligne['sexe'];
            ?>
            <tr class='tr9'>
                <td class='td9'><?php echo $_SESSION['n']; ?></td>
                <td class='td9'><?php echo $ligne['CIN']; ?></td>
                <td class='td9'><?php echo $ligne['Nom_electeur']; ?></td>
                <td class='td9'><?php echo $ligne['Prenom_electeur']; ?></td>
                <td class='td9'><?php echo $ligne['Date_naissance']; ?></td>
                <td class='td9'><?php echo $ligne['sexe']; ?></td>
                <td class='td9'><?php echo $ligne['commune']; ?></td>
                <td class='td9'><?php echo $ligne['Niveau_scolaire']; ?></td>
                <td class='td9'><?php echo $ligne['Profession']; ?></td>
                <td class='td9'><?php echo $ligne['adresse']; ?></td>
                <td class='td9'><?php echo $ligne['lieu_naissance']; ?></td>
                <td class='td9'><?php echo $ligne['etat_civil']; ?></td>
                <td class='td9'>
                    <span class="edit-link">
                        <a href="mod.php?cin=<?php echo $ligne['CIN']; ?>">
                            <img src="edit.png" alt="Edit">
                        </a>
                    </span>
                    <span class="delete-link">
                        <a href="sup.php?cin=<?php echo $ligne['CIN']; ?>">
                            <img src="trash.png" alt="Delete">
                        </a>
                    </span>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
