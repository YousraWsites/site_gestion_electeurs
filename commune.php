<?php include("head.php");?> 
<?php
if(isset($_POST['connexion']))
{
$login_valide = "F700000";
$pwd_valide = "yusrayusra";
if(($_POST['login'] == $login_valide) && ($_POST['mtp'] == $pwd_valide)) {
header('location: acceuil.php');
}
else {
  echo"<script>alert('erreur !!')</script>";

}}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Page d'acceuil
        </title>
        <link rel="icon" type="image/png" href="icone1.png">
        <style>
            
             .formul{width:500px;height:220px;margin-top:80px;margin-left:170px;background-color:#e6eeff;border: 2px solid #dbeaff;
               border-radius: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);}
             .f2{font-size:20px;}
             input{width:280px;height:20px;}
             form{margin-top:55px;}
             legend{font-size:25px;}
             .image{margin-left:120px;width:230px;height:220px;margin-top:40px}
             button {
             background-color: transparent;
             border: none;
             padding: 0;
              cursor: pointer;
                }
             .connim{width:35px;height:35px;}
            
              
        </style>
        <script>
        function validerFormulaire() {
            var login = document.getElementsByName("login")[0].value;
            var mdp = document.getElementsByName("mtp")[0].value;

            if (login === "" || mdp === "") {
                alert("Veuillez saisir votre login et mot de passe !");
                return false;
            }

            return true;
        }
    </script>
       
    </head>
    <body>
        
        <table  >
            <tr> <td><img class="image" src="royaume1.jpg">
            <p style="font-weight: bold; color: black; text-align: center;margin-left:120px;font-size:25px;">Ministère de l'Intérieur</p></td>
             <td><fieldset class="formul">
           
         <form method="POST" action="commune.php" onsubmit="return validerFormulaire()" >
          
           <table >
              
               <tr><td class="f2"> Login :</td><td class="f2"> <input type="text" size="30" name="login" ></td></tr>
               <tr><td class="f2"> Mot de passe :</td><td class="f2"> <input type="password" size="30" name="mtp"></td></tr>
                         
               
              
            </table><br><br>
            <button type="submit" name="connexion"><img src="connexionbouton.png" ALT="valier" class="connim"></button>  
          

         </form>
         </fieldset></td></tr>
         

       </table>

    </body>
</html>