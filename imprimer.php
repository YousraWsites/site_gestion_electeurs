<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Imprimer</title>
    
        <style>
            @media print{
                button{display:none;}
            }
            .aff{font-weight:bold;;padding-left:10px;}
            .cc{margin-left:100px;}
            table{width:1000px;height:1000px;}
            td{font-size:30px;padding:10px;}
            </style>
        
       
           
        </head>
        <body>
            <div class="cc">
        <?php 
       
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
       
           $requete = "SELECT COUNT(*) AS count FROM electeurs WHERE commune = '{$_SESSION['commune']}'";

           $resultat = mysqli_query($connexion, $requete);
           $row = mysqli_fetch_assoc($resultat);
           $count = $row['count'];
           
           $_SESSION['num']=$count;
  
 
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
  echo "<tr><td class='aff'>Numero BV :</td><td>{$_SESSION['numbv']}</td><td class='aff'>: رقم مكتب الاقتراع</td></tr>";
   echo "<tr><td class='aff'>Ecole :</td><td>{$_SESSION['ecole']}</td><td class='aff'>:مدرسة</td></tr>";
   echo "<tr><td class='aff'>Adresse vote :</td><td>{$_SESSION['adresse1']}</td><td class='aff'>:عنوان الإقتراع</td></tr>";

  echo "</table>";
    echo'<button onclick="window.print()">Imprimer</button>';
   echo' <a href="acceuil.php"><button>Retour à l\'accueil</button></a>';
    
  
   echo "<br>";
   
   
   mysqli_free_result($resultat);
   mysqli_close($connexion);





?>
</div>

       </body>
       </html>