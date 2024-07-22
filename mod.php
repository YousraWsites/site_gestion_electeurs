<?php include("head.php");?>
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
$cin = $_GET['cin'];
$requete = mysqli_query($connexion, "SELECT * FROM electeurs WHERE CIN = '$cin'");
$ligne = mysqli_fetch_assoc($requete);
$_SESSION['cin3']= $ligne['CIN'];
$_SESSION['commune3']= $ligne['commune'];
$_SESSION['num3']= $ligne['num_or'];
$_SESSION['nom3'] = $ligne['Nom_electeur'];
$_SESSION['prenom3'] = $ligne['Prenom_electeur'];
$_SESSION['date3'] = $ligne['Date_naissance'];
$_SESSION['commune3'] = $ligne['commune'];
$_SESSION['niveau3']= $ligne['Niveau_scolaire'];
$_SESSION['profession3'] = $ligne['Profession'];
$_SESSION['adresse3'] = $ligne['adresse'];
$_SESSION['lieu3']= $ligne['lieu_naissance'];
$_SESSION['etat3']= $ligne['etat_civil'];
$_SESSION['sexe3']= $ligne['sexe'];


?>
<!DOCTYPE html>
 <html>
  <head>
    <title>inscription</title>
    <meta charset="UTF-8">
    <style type="text/css">
       .ins {
            
            width: 500px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            margin-left: 370px;
        }
        .ins td {
            padding: 5px;/*espace entre les cellules*/
        }
        .ins input[type="submit"] {
            width:90px;height:30px;
            background-color:#417ccd;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .ins input[type="submit"]:hover {
            background-color: #dbeaff;
        }
        
       
           
        </style></style>
  </head>
  <body>
  <div class="ins">
            
            
            <form method="POST" action="fier.php">
            <table >
                <tr>
                    <td >Commune :</td>
                    <td><select name="commune" >
                           <option <?php if ($_SESSION['commune3'] == 'Oujda وجدة') { echo 'selected'; } ?> >Oujda وجدة</option>
                           <option <?php if ($_SESSION['commune3'] == 'Bni-Drar بني درار') { echo 'selected'; } ?>  >Bni-Drar بني درار</option>
                           <option <?php if ($_SESSION['commune3'] == 'Naima النعيمة') { echo 'selected'; } ?> >Naima النعيمة</option>
                           <option  <?php if ($_SESSION['commune3'] == 'Ain Sfa عين الصفا') { echo 'selected'; } ?>>Ain Sfa عين الصفا</option>
                           <option <?php if ($_SESSION['commune3'] == 'Bsara بصارة') { echo 'selected'; } ?> >Bsara بصارة</option>
                           <option <?php if ($_SESSION['commune3'] == 'Bni Khaled بني خالد') { echo 'selected'; } ?>>Bni Khaled بني خالد</option>
                           <option <?php if ($_SESSION['commune3'] == 'Angad أهل انكاد') { echo 'selected'; } ?> >Angad أهل انكاد</option>
                           <option <?php if ($_SESSION['commune3'] == 'Mestferki مستفركي') { echo 'selected'; } ?> >Mestferki مستفركي</option>
                           <option <?php if ($_SESSION['commune3'] == 'Sidi Boulenouar سيدي بولنوار') { echo 'selected'; } ?> >Sidi Boulenouar سيدي بولنوار</option>
                           <option <?php if ($_SESSION['commune3'] == 'Sidi Moussa Lemhaya سيدي موسى المهاية') { echo 'selected'; } ?> >Sidi Moussa Lemhaya سيدي موسى المهاية</option>
                           <option <?php if ($_SESSION['commune3'] == 'Isly إسلي') { echo 'selected'; } ?> >Isly إسلي</option></select>
                    </td>
                    <td  >: الجماعة</td>
                </tr>
                <tr><td>Numero d'ordre :</td><td><input type="text" value="<?php  echo $_SESSION['num3'] ;?>" size="30" name="num1" readonly></td><td>: الرقم الترتيبي </td></tr>
                <tr><td >Nom :</td><td><input type="text" size="30" value="<?php echo $_SESSION['nom3'];?>" name="nom1"></td><td>: الإسم العائلي</td></tr>
        
                <tr><td >Prenom :</td><td><input type="text" size="30"value="<?php echo $_SESSION['prenom3'] ;?>" name="prenom1"></td><td>: الإسم الشخصي</td></tr>
                <tr><td >CIN :</td><td><input type="text" size="30"value="<?php echo $_SESSION['cin3'] ;?>" name="cin1"></td><td>: ب ت و</td></tr>
                <tr>
                <tr>
    <td>Sexe :</td>
    <td>
        <input type="radio" value="feminin" name="s"<?php if($_SESSION['sexe3']=="feminin") { echo 'checked="checked"' ; } ?>>Féminin
        <input type="radio" value="masculin" name="s"<?php if($_SESSION['sexe3']=="masculin") { echo 'checked="checked"' ; } ?>>Masculin
    </td>
    <td>: الجنس</td>
</tr>

</tr>

                <tr><td>Date de naissance:</td><td><input type="Date" value="<?php echo $_SESSION['date3'] ;?>" size="30" name="date1"></td><td>: تاريخ الإزدياد</td></tr>
                <tr><td >Lieu de naissance :</td><td><input type="text" size="30" value="<?php echo $_SESSION['lieu3'] ;?>" name="lieu1"></td><td>: مكان الإزدياد</td></tr>
                <tr><td >Adresse :</td><td><input type="text" size="30" value="<?php echo $_SESSION['adresse3'] ;?>" name="adresse1"></td><td>: العنوان</td></tr>
                <tr>
    <td >Etat civil :</td>
    <td >
        <select  class="liste1" name="etat1">
            <option <?php if ($_SESSION['etat3'] == 'Célibataire عازب(ة)') { echo 'selected'; } ?> >Célibataire عازب(ة)</option>
            <option <?php if ($_SESSION['etat3'] == 'Marié(e) متزوج(ة)') { echo 'selected'; } ?>>Marié(e) متزوج(ة)</option>
            <option <?php if ($_SESSION['etat3'] == 'Divorcé(e) مطلق(ة)') { echo 'selected'; } ?>>Divorcé(e) مطلق(ة)</option>
            <option <?php if ($_SESSION['etat3'] == 'Veuf أرمل(ة)') { echo 'selected'; } ?>>Veuf أرمل(ة)</option>
        </select>
    </td>
    <td>: الحالة العائلية</td>
</tr>

<tr>
    <td>Niveau scolaire :</td>
    <td>
        <select class="liste1" name="niveau1">
            <option <?php if ($_SESSION['niveau3'] == 'aucun بدون') { echo 'selected'; } ?> >aucun بدون</option>
            <option <?php if ($_SESSION['niveau3'] == 'Primaire ابتدائي') { echo 'selected'; } ?>>Primaire ابتدائي</option>
            <option <?php if ($_SESSION['niveau3'] == 'College اعدادي') { echo 'selected'; } ?>>College اعدادي</option>
            <option <?php if ($_SESSION['niveau3'] == 'Lycée ثانوي') { echo 'selected'; } ?>>Lycée ثانوي</option>
            <option <?php if ($_SESSION['niveau3'] == 'Supérieur عالي') { echo 'selected'; } ?>>Supérieur عالي</option>
        </select>
    </td>
    <td>: المستوى الدراسي</td>
</tr>
                <tr><td>Profession :</td><td><input type="text" size="30"value="<?php echo $_SESSION['profession3'] ;?>" name="profession1"></td><td>: المهنة</td></tr>
                <tr><td></td><td><input type="submit" value="Enregistrer" name="fier"> </td><td></td></tr>
        </table>
        </form>
        </div>

</body>
</html>