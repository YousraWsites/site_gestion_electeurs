<?php include("head.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Statistiques des communes</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        .body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        canvas {
            max-width: 500px; 
            max-height: 350px;
            margin-left:580px;
            margin-top:70px;
        }
        .menu {
                width: 350px;
                margin-top: 100px;
                margin-left: 40px;
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
        
       
    </style>
</head>
<body class="body">
<div class="menu">
            <a class="menu-item" href="sexe.php"><img class="icon" src="gender.png">Stat Genre</a>
            <a class="menu-item" href="etatcivil.php"><img class="icon" src="family.png">Stat Etat Civil</a>
            <a class="menu-item" href="etatscolaire.php"><img class="icon" src="graduation-hat.png">Stat Etat Scolaire</a>
            <a class="menu-item" href="acceuil.php"><img class="icon" src="home.png">Accueil</a>
           
        </div>
    
    
    
    <canvas id="chart" width="200" height="200"></canvas>

    <script>
        // Code pour récupérer les données des communes depuis MySQL et les préparer pour le graphique
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

        // Exécuter la requête pour obtenir le total des enregistrements par commune
        $query1 = "SELECT commune, COUNT(*) AS total FROM electeurs WHERE sexe = 'F' GROUP BY commune";
        $result_feminin = mysqli_query($connexion, $query1);

        $query2 = "SELECT commune, COUNT(*) AS total FROM electeurs WHERE sexe = 'M' GROUP BY commune";
        $result_masculin = mysqli_query($connexion,$query2);

        // Préparer les données pour le graphique
        $communes = array();
        $feminin_totals = array();
        $masculin_totals = array();
        while ($row = mysqli_fetch_assoc($result_feminin)) {
            $communes[] = $row['commune'];
            $feminin_totals[] = $row['total'];
        }
        while ($row = mysqli_fetch_assoc($result_masculin)) {
            $masculin_totals[] = $row['total'];
        }

        // Convertir les tableaux PHP en chaînes JSON pour l'utilisation dans JavaScript
        $communes_json = json_encode($communes);
        $feminin_totals_json = json_encode($feminin_totals);
        $masculin_totals_json = json_encode($masculin_totals);
        ?>
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

// Récupérer la liste de toutes les communes
$query_communes = "SELECT DISTINCT commune FROM electeurs";
$result_communes = mysqli_query($connexion, $query_communes);

// Initialiser les tableaux pour les totaux
$communes = array();
$feminin_totals = array();
$masculin_totals = array();

// Parcourir toutes les communes
while ($row_commune = mysqli_fetch_assoc($result_communes)) {
    $commune = $row_commune['commune'];

    // Requête pour obtenir le total des enregistrements féminins par commune
    $query_feminin = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND sexe = 'masculin'";
    $result_feminin = mysqli_query($connexion, $query_feminin);
    $row_feminin = mysqli_fetch_assoc($result_feminin);
    $feminin_total = $row_feminin['total'];

    // Requête pour obtenir le total des enregistrements masculins par commune
    $query_masculin = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND sexe = 'feminin'";
    $result_masculin = mysqli_query($connexion, $query_masculin);
    $row_masculin = mysqli_fetch_assoc($result_masculin);
    $masculin_total = $row_masculin['total'];

    // Ajouter les données à leurs tableaux respectifs
    $communes[] = $commune;
    $feminin_totals[] = $feminin_total;
    $masculin_totals[] = $masculin_total;
}

// Convertir les tableaux PHP en chaînes JSON pour l'utilisation dans JavaScript
$communes_json = json_encode($communes);
$feminin_totals_json = json_encode($feminin_totals);
$masculin_totals_json = json_encode($masculin_totals);
?>


        // Code JavaScript pour créer le graphique avec les données récupérées
        // Récupérer les données des communes et des totaux depuis PHP
        var communes = <?php echo $communes_json; ?>;
        var feminin_totals = <?php echo $feminin_totals_json; ?>;
        var masculin_totals = <?php echo $masculin_totals_json; ?>;

        // Créer le contexte du graphique
        var ctx = document.getElementById('chart').getContext('2d');

        // Créer le graphique en utilisant Chart.js avec les pourcentages
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: communes,
                datasets: [{
                    label: 'Féminin',
                    data: feminin_totals,
                    backgroundColor: '#FFB6C1	'
                },
                {
                    label: 'Masculin',
                    data: masculin_totals,
                    backgroundColor: '#87CEFA'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        formatter: (value, ctx) => {
                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return percentage;
                        },
                        color: '#fff'
                    }
                }
            }
        });
    </script>
</body>
</html>
