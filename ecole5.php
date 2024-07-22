<?php include("head.php");?>
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
                <th >Ecole</th>
                <th>Bureau de vote</th>
                <th>Adresse</th>
                
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
                $_SESSION['a'] = $ligne['ecole2'];
                $_SESSION['b'] = $ligne['num_BV'];
                $_SESSION['j'] = $ligne['adresse'];
               
            ?>
            <tr class='tr9'>
                <td class='td9'><?php echo $_SESSION['a']; ?></td>
                <td class='td9'><?php echo $_SESSION['b']; ?></td>
                <td class='td9'><?php echo $_SESSION['j']; ?></td>
                
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
