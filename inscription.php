<?php include("head.php");?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <script>
function validerFormulaire() {

  var nom = document.getElementsByName("nom1")[0].value;
  var prenom = document.getElementsByName("prenom1")[0].value;
  var cin = document.getElementsByName("cin1")[0].value;
  var dateNaissance = document.getElementsByName("date1")[0].value;
  var lieuNaissance = document.getElementsByName("lieu1")[0].value;
  var adresse = document.getElementsByName("adresse1")[0].value;
  var profession = document.getElementsByName("profession1")[0].value;


  if (nom === "" || prenom === "" || cin === "" || dateNaissance === "" || lieuNaissance === "" || adresse === "" || profession === "") {
    alert("Veuillez remplir tous les champs !");
    return false; 
  }
  
  return true;
}

</script>
      
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
            
            width: 500px;
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
            padding: 10px 20px;
            background-color:#417ccd;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .ins input[type="submit"]:hover {
            background-color: #dbeaff;
        }
        .liste1{width:180px;}
       
           
        </style>
    </head>
    <body>
    
        <div class="menu">
            <a class="menu-item" href="inscription.php"><img class="icon" src="inscriptionim.png">Nouvelle Inscription</a>
            <a class="menu-item" href="Modsup.php"><img class="icon" src="modifsupp.png">Gestion des electeurs</a>
           
            <a class="menu-item" href="Bvote.php"><img class="icon" src="desk.png">Bureaux de Vote</a>
            <a class="menu-item" href="Statistique.php"><img class="icon" src="stat.png">Statistique</a>
            <a class="menu-item" href="recherche.php"><img class="icon" src="rech.png">Rechercher</a>
            <a class="menu-item" href="deconnexion.php"><img class="icon" src="logout.png">Deconnexion</a>
        </div>
        
        
        <div class="ins">
            
            
            <form method="POST" action="afficher.php" onsubmit="return validerFormulaire()" >
            <table >
                <tr>
                    <td>Commune :</td>
                    <td><select name="commune">
                           <option selected >Oujda وجدة</option>
                           <option  >Bni-Drar بني درار</option>
                           <option  >Naima النعيمة</option>
                           <option  >Ain Sfa عين الصفا</option>
                           <option  >Bsara بصارة</option>
                           <option>Bni Khaled بني خالد</option>
                           <option  >Angad أهل انكاد</option>
                           <option >Mestferki مستفركي</option>
                           <option  >Sidi Boulenouar سيدي بولنوار</option>
                           <option  >Sidi Moussa Lemhaya سيدي موسى المهاية</option>
                           <option  >Isly إسلي</option></select>
                    </td>
                    <td >: الجماعة</td>
                </tr>
                
                <tr><td>Nom :</td><td><input type="text" size="30" name="nom1"></td><td>: الإسم العائلي</td></tr>
        
                <tr><td>Prenom :</td><td><input type="text" size="30" name="prenom1"></td><td>: الإسم الشخصي</td></tr>
                <tr><td>CIN :</td><td><input type="text" size="30" name="cin1"></td><td>: ب ت و</td></tr>
                <tr><td>Sexe :</td><td><input type="radio" value="feminin"  name="sexe1"checked>Féminin<input type="radio" value="masculin" name="sexe1">Masculin</td><td>: الجنس</td></tr>
                <tr><td>Date de naissance:</td><td><input  type="Date" size="30" name="date1"></td><td>: تاريخ الإزدياد</td></tr>
                <tr><td>Lieu de naissance :</td><td><input type="text" size="30" name="lieu1"></td><td>: مكان الإزدياد</td></tr>
                <tr><td>Adresse :</td><td><input type="text" size="30" name="adresse1"></td><td>: العنوان</td></tr>
                <tr>
    <td>Etat civil :</td>
    <td>
        <select  class="liste1" name="etat1">
            <option selected>Célibataire عازب(ة)</option>
            <option>Marié(e) متزوج(ة)</option>
            <option>Divorcé(e) مطلق(ة)</option>
            <option>Veuf أرمل(ة)</option>
        </select>
    </td>
    <td>: الحالة العائلية</td>
</tr>

<tr>
    <td>Niveau scolaire :</td>
    <td>
        <select class="liste1" name="niveau1">
            <option selected>aucun بدون</option>
            <option>Primaire ابتدائي</option>
            <option>College اعدادي</option>
            <option>Lycée ثانوي</option>
            <option>Supérieur عالي</option>
        </select>
    </td>
    <td>: المستوى الدراسي</td>
</tr>

                <tr><td>Profession :</td><td><input type="txet" size="30" name="profession1"></td><td>: المهنة</td></tr>
                <tr><td></td><td><input type="submit" value="Enregistrer" name="envoyer" > </td><td></td></tr>
                
                
    
        </table>
        </form>
        </div>
        
    
                           

    </body>
       

</html>