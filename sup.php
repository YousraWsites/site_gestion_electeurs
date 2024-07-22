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

// Récupérer le paramètre "cin" passé dans l'URL
if (isset($_GET['cin'])) {
    $cin = $_GET['cin'];

    // Supprimer l'électeur avec le CIN spécifié
    $suppression = mysqli_query($connexion, "DELETE FROM electeurs WHERE CIN = '$cin'");

    if ($suppression) {
        echo "<script>alert('Nouvel electeur suprrime avec succès'); window.location.href = 'Modsup.php';</script>";
        echo "Une erreur s'est produite lors de la suppression de l'électeur.";
    }
} else {
    echo "Le paramètre CIN n'a pas été spécifié.";
}


?>
