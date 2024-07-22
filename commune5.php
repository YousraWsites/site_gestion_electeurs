<?php include("head.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ecole</title>
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
            margin-left:250px;
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
            width: 70%;
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
<a href="acceuil.php" class="acc">Retourner à la page d'accueil</a>
    <div class="container">
       
        <table class='t9'>
            <tr class='tr9'>
                <th >Commune</th>
                <th>Ecole</th>
                
                
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
            $requete = mysqli_query($connexion, "SELECT * FROM bv");
            while ($ligne = mysqli_fetch_assoc($requete)) {
                $_SESSION['g'] = $ligne['commune2'];
                $_SESSION['h'] = $ligne['ecole2'];
                
               
            ?>
            <tr class='tr9'>
                <td class='td9'><?php echo $_SESSION['g']; ?></td>
                <td class='td9'><?php echo $_SESSION['h']; ?></td>
                
                
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
