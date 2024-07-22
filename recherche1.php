
<?php include("head.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recherche</title>
    
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

        th {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
            background-color: #c3ddff;
            color: #fff;
        }
        .bb {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

      

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST['chercher'])) {
            $connexion = mysqli_connect("localhost", "root", "");
            if (!$connexion) {
                echo "Désolé, la connexion à localhost est impossible";
                exit;
            }
            if (!mysqli_select_db($connexion, 'gestionelection')) {
                echo "Désolé, l'accès à la base de données gestionelection est impossible";
                exit;
            }
            $CIN_ch = $_POST['CIN2'];

            $requete = mysqli_query($connexion, "SELECT * FROM electeurs WHERE CIN LIKE '%$CIN_ch%'");
            ?>
            <a href="acceuil.php" class="acc">Retourner à la page d'accueil</a>
            <div class='ph'>Les électeurs qui correspondent à votre recherche sous le CIN : <b>" <?php echo $CIN_ch; ?> "</b></div>
           
           
            <table class='t9'>
                <tr >
                    <th>N°</th>
                    <th>CIN</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Commune</th>
                    <th>Niveau scolaire</th>
                    <th>Profession</th>
                    <th>Adresse</th>
                    <th>Lieu de naissance</th>
                    <th>État civil</th>
                </tr>
                <?php
                while ($ligne = mysqli_fetch_assoc($requete)) {
                ?>
                <tr>
                    <td class='bb'><?php echo $ligne['num_or']; ?></td>
                    <td class='bb'><?php echo $ligne['CIN']; ?></td>
                    <td class='bb'><?php echo $ligne['Nom_electeur']; ?></td>
                    <td class='bb'><?php echo $ligne['Prenom_electeur']; ?></td>
                    <td class='bb'><?php echo $ligne['Date_naissance']; ?></td>
                    <td class='bb'><?php echo $ligne['commune']; ?></td>
                    <td class='bb'><?php echo $ligne['Niveau_scolaire']; ?></td>
                    <td class='bb'><?php echo $ligne['Profession']; ?></td>
                    <td class='bb'><?php echo $ligne['adresse']; ?></td>
                    <td class='bb'><?php echo $ligne['lieu_naissance']; ?></td>
                    <td class='bb'><?php echo $ligne['etat_civil']; ?></td>
                </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</body>
</html>
