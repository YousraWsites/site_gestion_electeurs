<?php include("head.php");?>
<?php 

if(isset($_POST['dist'])) {
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

}
$query = "SELECT num_BV FROM bv";
$result = mysqli_query($connexion, $query);

$options = array();
while ($row = mysqli_fetch_assoc($result)) {
    $options[] = $row;
}
$query2 = "SELECT ecole2 FROM bv";
$result2 = mysqli_query($connexion, $query2);

$options2 = array();
while ($row2 = mysqli_fetch_assoc($result2)) {
    $options2[] = $row2;
}
$query3 = "SELECT adresse FROM bv";
$result3 = mysqli_query($connexion, $query3);

$options3 = array();
while ($row3 = mysqli_fetch_assoc($result3)) {
    $options3[] = $row3;
}
   
   ?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Modification</title>
    
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
            .ins {
            
            width: 510px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            margin-left:550px;
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
            
            
            <form method="POST" action="afficher2.php">
            <table >
                <tr>
                    <td >Commune :</td>
                    <td><select name="commune" >
                           <option <?php if ($_SESSION['commune'] == 'Oujda وجدة') { echo 'selected'; } ?> >Oujda وجدة</option>
                           <option <?php if ($_SESSION['commune'] == 'Bni-Drar بني درار') { echo 'selected'; } ?>  >Bni-Drar بني درار</option>
                           <option <?php if ($_SESSION['commune'] == 'Naima النعيمة') { echo 'selected'; } ?> >Naima النعيمة</option>
                           <option  <?php if ($_SESSION['commune'] == 'Ain Sfa عين الصفا') { echo 'selected'; } ?>>Ain Sfa عين الصفا</option>
                           <option <?php if ($_SESSION['commune'] == 'Bsara بصارة') { echo 'selected'; } ?> >Bsara بصارة</option>
                           <option <?php if ($_SESSION['commune'] == 'Bni Khaled بني خالد') { echo 'selected'; } ?>>Bni Khaled بني خالد</option>
                           <option <?php if ($_SESSION['commune'] == 'Angad أهل انكاد') { echo 'selected'; } ?> >Angad أهل انكاد</option>
                           <option <?php if ($_SESSION['commune'] == 'Mestferki مستفركي') { echo 'selected'; } ?> >Mestferki مستفركي</option>
                           <option <?php if ($_SESSION['commune'] == 'Sidi Boulenouar سيدي بولنوار') { echo 'selected'; } ?> >Sidi Boulenouar سيدي بولنوار</option>
                           <option <?php if ($_SESSION['commune'] == 'Sidi Moussa Lemhaya سيدي موسى المهاية') { echo 'selected'; } ?> >Sidi Moussa Lemhaya سيدي موسى المهاية</option>
                           <option <?php if ($_SESSION['commune'] == 'Isly إسلي') { echo 'selected'; } ?> >Isly إسلي</option></select>
                    </td>
                    <td  >: الجماعة</td>
                </tr>
                <tr><td>Numero d'ordre :</td><td><input type="text" value="<?php  echo $_SESSION['num'] ;?>" size="30" name="num1" readonly></td><td>: الرقم الترتيبي </td></tr>
                <tr><td >Nom :</td><td><input type="text" size="30" value="<?php echo $_SESSION['nom'];?>" name="nom1"></td><td>: الإسم العائلي</td></tr>
        
                <tr><td >Prenom :</td><td><input type="text" size="30"value="<?php echo $_SESSION['prenom'] ;?>" name="prenom1"></td><td>: الإسم الشخصي</td></tr>
                <tr><td >CIN :</td><td><input type="text" size="30"value="<?php echo $_SESSION['cin'] ;?>" name="cin1"></td><td>: ب ت و</td></tr>
                <tr><td >Sexe :</td><td><input type="radio" value="feminin" <?php if($_SESSION['sexe']=="feminin") { echo 'checked="checked"' ; } ?>  name="sexe1">Féminin<input type="radio" value="masculin" <?php if($_SESSION['sexe']=="masculin") { echo 'checked="checked"' ; } ?>name="sexe1">Masculin</td><td>: الجنس</td></tr>
                <tr><td>Date de naissance:</td><td><input type="Date" value="<?php echo $_SESSION['date'] ;?>" size="30" name="date1"></td><td>: تاريخ الإزدياد</td></tr>
                <tr><td >Lieu de naissance :</td><td><input type="text" size="30" value="<?php echo $_SESSION['lieu'] ;?>" name="lieu1"></td><td>: مكان الإزدياد</td></tr>
                <tr><td >Adresse :</td><td><input type="text" size="30" value="<?php echo $_SESSION['adresse'] ;?>" name="adresse1"></td><td>: العنوان</td></tr>
                <tr>
    <td >Etat civil :</td>
    <td >
        <select  class="liste1" name="etat1">
            <option <?php if ($_SESSION['etat'] == 'Célibataire عازب(ة)') { echo 'selected'; } ?> >Célibataire عازب(ة)</option>
            <option <?php if ($_SESSION['etat'] == 'Marié(e) متزوج(ة)') { echo 'selected'; } ?>>Marié(e) متزوج(ة)</option>
            <option <?php if ($_SESSION['etat'] == 'Divorcé(e) مطلق(ة)') { echo 'selected'; } ?>>Divorcé(e) مطلق(ة)</option>
            <option <?php if ($_SESSION['etat'] == 'Veuf أرمل(ة)') { echo 'selected'; } ?>>Veuf أرمل(ة)</option>
        </select>
    </td>
    <td>: الحالة العائلية</td>
</tr>

<tr>
    <td>Niveau scolaire :</td>
    <td>
        <select class="liste1" name="niveau1">
            <option <?php if ($_SESSION['niveau'] == 'aucun بدون') { echo 'aucun بدون'; } ?> >aucun بدون</option>
            <option <?php if ($_SESSION['niveau'] == 'Primaire ابتدائي') { echo 'selected'; } ?>>Primaire ابتدائي</option>
            <option <?php if ($_SESSION['niveau'] == 'College اعدادي') { echo 'selected'; } ?>>College اعدادي</option>
            <option <?php if ($_SESSION['niveau'] == 'Lycée ثانوي') { echo 'selected'; } ?>>Lycée ثانوي</option>
            <option <?php if ($_SESSION['niveau'] == 'Supérieur عالي') { echo 'selected'; } ?>>Supérieur عالي</option>
        </select>
    </td>
    <td>: المستوى الدراسي</td>
</tr>
                <tr><td>Profession :</td><td><input type="text" size="30"value="<?php echo $_SESSION['profession'] ;?>" name="profession1"></td><td>: المهنة</td></tr>
                <tr>
                    <td>Numero BV :</td>
                    <td>
                        <select name="numero_bv4">
                            <?php foreach ($options as $option) { ?>
                                <option value="<?php echo $option['num_BV']; ?>">
                                    <?php echo $option['num_BV']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>: رقم مكتب الاقتراع</td>
                </tr>
                <tr>
                    <td>Ecole :</td>
                    <td>
                        <select name="ecole4">
                            <?php foreach ($options2 as $option2) { ?>
                                <option value="<?php echo $option2['ecole2']; ?>">
                                    <?php echo $option2['ecole2']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>:مدرسة</td>
                </tr>
                <tr>
                    <td>Adresse vote :</td>
                    <td>
                        <select name="adresse4">
                            <?php foreach ($options3 as $option3) { ?>
                                <option value="<?php echo $option3['adresse']; ?>">
                                    <?php echo $option3['adresse']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>:عنوان الإقتراع</td>
                </tr>
               
                <tr><td></td><td><input type="submit" value="Afficher" name="envoyer"> </td><td></td></tr>
        </table>
        </form>
        </div>
        
    
                           

    </body>
       

</html>