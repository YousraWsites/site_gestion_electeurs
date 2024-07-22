<?php
// Récupérez la commune sélectionnée depuis la requête GET
$commune = $_GET['commune'];

// Effectuez la requête SQL pour compter le nombre d'enregistrements liés à la commune
$connexion = mysqli_connect("localhost", "root", "");
if (!$connexion) {
    echo "Désolé, la connexion à localhost est impossible";
    exit;
}

if (!mysqli_select_db($connexion, 'gestionelection')) {
    echo "Désolé, l'accès à la base de données gestionelection est impossible";
    exit;
}

$requete = "SELECT COUNT(*) AS count FROM electeurs WHERE commune = '$commune'";
$resultat = mysqli_query($connexion, $requete);
$row = mysqli_fetch_assoc($resultat);
$numberOfRecords = $row['count'];

// Calculez le nouveau numéro d'ordre en ajoutant 1 au nombre d'enregistrements
$newOrderNumber = $numberOfRecords + 1;

// Retournez le nouveau numéro d'ordre au format JSON
echo json_encode(['numOrdre' => $newOrderNumber]);
$newOrderNumber = $row['numOrdre'];

?>
