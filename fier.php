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

$commune = $_POST['commune'];
$num = $_POST['num1'];
$nom = $_POST['nom1'];
$prenom = $_POST['prenom1'];
$cin = $_POST['cin1'];
$sexe = $_POST['s'];
$date_naissance = $_POST['date1'];
$lieu_naissance = $_POST['lieu1'];
$adresse = $_POST['adresse1'];
$etat_civil = $_POST['etat1'];
$niveau_scolaire = $_POST['niveau1'];
$profession = $_POST['profession1'];

$requete = "UPDATE electeurs SET commune='$commune',sexe='$sexe', num_or='$num', Nom_electeur='$nom', Prenom_electeur='$prenom', Date_naissance='$date_naissance', lieu_naissance='$lieu_naissance', adresse='$adresse', etat_civil='$etat_civil', Niveau_scolaire='$niveau_scolaire', Profession='$profession' WHERE CIN='$cin'";

$resultat = mysqli_query($connexion, $requete);

if ($resultat) {
    echo "<script>alert('Les modifications ont été enregistrées avec succès');
    window.location.href = 'Modsup.php';</script>";
} else {
    echo "Une erreur s'est produite lors de l'enregistrement des modifications.";
}

?>
