
<?php 
session_start();
include("head.php");?>

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
            .coco {
            margin-top: 30px;
            margin-left: 550px;
            border: 1px solid #cfe7f6;
            padding: 10px;
            border-radius: 10px;
            width:450px;
            background-color:white;
        }
       
        .c{
          
            background-color:#417ccd;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            height:30px;
        }
        
        .c:hover {
            background-color: #dbeaff;
        }
        .aff{font-weight:bold;padding:5px;padding-left:20px;}
        .m {
       
        padding: 10px 20px;
        background-color: #417ccd;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        height: 30px;
        
    }
    
    .m:hover {
        background-color: #dbeaff;

    }
   
</style>
<script>
        function redirectToInscription() {
            window.location.href = "inscription.php";
        }
    </script>       
       
           
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
        <div class="coco">
        <?php 
       
           
        
            
        
          
       
        
        if(isset($_POST['envoyer'])) {
             $_SESSION['commune']=$_POST['commune'];
             
            $connexion = mysqli_connect("localhost", "root", "");
            if (!$connexion) {
                echo "Désolé, la connexion à localhost est impossible";
                exit;
            }
            if (!mysqli_select_db($connexion, 'gestionelection')) {
                echo "Désolé, l'accès à la base de données gestionelection est impossible";
                exit;
            }
            

$cin = $_POST['cin1'];


$cin = mysqli_real_escape_string($connexion, $cin);


$sql1 = "SELECT * FROM electeurs WHERE CIN = '$cin'";
$result1 = mysqli_query($connexion, $sql1);

// Vérifier s'il y a des résultats
if (mysqli_num_rows($result1) > 0) {
    
    echo "<script>alert('Le CIN existe déjà dans la base de données.');redirectToInscription();</script>";
    exit;
} else {


        
            $requete = "SELECT COUNT(*) AS count FROM electeurs WHERE commune = '{$_SESSION['commune']}'";

            $resultat = mysqli_query($connexion, $requete);
            $row = mysqli_fetch_assoc($resultat);
            $count = $row['count'];
            $nextId = $count + 1;
            $_SESSION['num']=$nextId;
   
   $_SESSION['nom']= $_POST['nom1']; 
   $_SESSION['prenom']= $_POST['prenom1'];
   $_SESSION['cin']= $_POST['cin1'];
   $_SESSION['sexe']= $_POST['sexe1'];
   $_SESSION['date']= $_POST['date1'];
   $_SESSION['lieu']= $_POST['lieu1'];
   $_SESSION['adresse']= $_POST['adresse1'];
   $_SESSION['etat']= $_POST['etat1'];
   $_SESSION['niveau']= $_POST['niveau1'];
   $_SESSION['profession']= $_POST['profession1'];
   echo "<table>";
   echo "<tr><td class='aff'>Commune :</td><td>{$_SESSION['commune']}</td><td class='aff'>: الجماعة</td></tr>";
   echo "<tr><td class='aff'>Numero d'ordre :</td><td>{$_SESSION['num']}</td><td class='aff'>: الرقم الترتيبي</td></tr>";
   echo "<tr><td class='aff'>Nom :</td><td>{$_SESSION['nom']}</td><td class='aff'>: الإسم العائلي</td></tr>";
   echo "<tr><td class='aff'>Prenom :</td><td>{$_SESSION['prenom']}</td><td class='aff'>: الإسم الشخصي</td></tr>";
   echo "<tr><td class='aff'>CIN :</td><td>{$_SESSION['cin']}</td><td class='aff'>: ب ت و</td></tr>";
   echo "<tr><td class='aff'>Sexe :</td><td>{$_SESSION['sexe']}</td><td class='aff'>: الجنس</td></tr>";
   echo "<tr><td class='aff'>Date de naissance:</td><td>{$_SESSION['date']}</td><td class='aff'>: تاريخ الإزدياد</td></tr>";
   echo "<tr><td class='aff'>Lieu de naissance :</td><td>{$_SESSION['lieu']}</td><td class='aff'>: مكان الإزدياد</td></tr>";
   echo "<tr><td class='aff'>Adresse :</td><td>{$_SESSION['adresse']}</td><td class='aff'>: العنوان</td></tr>";
   echo "<tr><td class='aff'>Etat civil :</td><td>{$_SESSION['etat']}</td><td class='aff'>: الحالة العائلية</td></tr>";
   echo "<tr><td class='aff'>Niveau scolaire :</td><td>{$_SESSION['niveau']}</td><td class='aff'>: المستوى الدراسي</td></tr>";
   echo "<tr><td class='aff'>Profession :</td><td>{$_SESSION['profession']}</td><td class='aff'>: المهنة</td></tr>";
   echo "</table>";
   
    echo "<br>";
    echo "<form action='modifier.php' method='post'>";
    echo '<input type="submit"  name="mod" value="Modifier"class="c">';
    echo "</form>";
    echo "<br>";
    echo "<form action='Distribution.php' method='post'>";
    echo "<input type='submit'  name='dist'  value='distribuer ' class='c'  > ";
    echo "</form>";
    
    mysqli_free_result($resultat);
    mysqli_close($connexion);}

}



?>
</div>
        </body>
        </html>