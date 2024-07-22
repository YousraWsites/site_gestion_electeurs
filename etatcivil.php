<?php include("head.php"); ?>
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
            margin-left: 580px;
            margin-top: 70px;
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
    $connexion = mysqli_connect("localhost", "root", "", "gestionelection");
    if (!$connexion) {
        echo "Désolé, la connexion à localhost est impossible";
        exit;
    }

    // Exécuter la requête pour obtenir le total des enregistrements par commune (état civil célibataire)
    $query_celib = "SELECT commune, COUNT(*) AS total FROM electeurs WHERE etat_civil = 'Célibataire عازب(ة)' GROUP BY commune";
    $result_celib = mysqli_query($connexion, $query_celib);

    // Exécuter la requête pour obtenir le total des enregistrements par commune (état civil marié)
    $query_mar = "SELECT commune, COUNT(*) AS total FROM electeurs WHERE etat_civil = 'Marié(e) متزوج(ة)' GROUP BY commune";
    $result_mar = mysqli_query($connexion, $query_mar);

    // Exécuter la requête pour obtenir le total des enregistrements par commune (état civil divorcé)
    $query_div = "SELECT commune, COUNT(*) AS total FROM electeurs WHERE etat_civil = 'Divorcé(e) مطلق(ة)' GROUP BY commune";
    $result_div = mysqli_query($connexion, $query_div);

    // Exécuter la requête pour obtenir le total des enregistrements par commune (état civil veuf)
    $query_ve = "SELECT commune, COUNT(*) AS total FROM electeurs WHERE etat_civil = 'Veuf أرمل(ة)' GROUP BY commune";
    $result_ve = mysqli_query($connexion, $query_ve);

    // Préparer les données pour le graphique
    $communes = array();
    $celib_totals = array();
    $mar_totals = array();
    $div_totals = array();
    $ve_totals = array();

    while ($row = mysqli_fetch_assoc($result_celib)) {
        $communes[] = $row['commune'];
        $celib_totals[] = $row['total'];
    }

    while ($row = mysqli_fetch_assoc($result_mar)) {
        $mar_totals[] = $row['total'];
    }

    while ($row = mysqli_fetch_assoc($result_div)) {
        $div_totals[] = $row['total'];
    }

    while ($row = mysqli_fetch_assoc($result_ve)) {
        $ve_totals[] = $row['total'];
    }?>
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
$celib_totals = array();
$mar_totals = array();
$div_totals = array();
$ve_totals = array();

// Parcourir toutes les communes
while ($row_commune = mysqli_fetch_assoc($result_communes)) {
    $commune = $row_commune['commune'];

    // Requête pour obtenir le total des enregistrements célibataires par commune
    $query_celib = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND etat_civil = 'Célibataire عازب(ة)'";
    $result_celib = mysqli_query($connexion, $query_celib);
    $row_celib = mysqli_fetch_assoc($result_celib);
    $celib_total = $row_celib['total'];

    // Requête pour obtenir le total des enregistrements mariés par commune
    $query_mar = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND etat_civil ='Marié(e) متزوج(ة)'";
    $result_mar = mysqli_query($connexion, $query_mar);
    $row_mar = mysqli_fetch_assoc($result_mar);
    $mar_total = $row_mar['total'];

    // Requête pour obtenir le total des enregistrements divorcés par commune
    $query_div = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND etat_civil = 'Divorcé(e) مطلق(ة)'";
    $result_div = mysqli_query($connexion, $query_div);
    $row_div = mysqli_fetch_assoc($result_div);
    $div_total = $row_div['total'];

    // Requête pour obtenir le total des enregistrements veufs par commune
    $query_ve = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND etat_civil = 'Veuf أرمل(ة)'";
    $result_ve = mysqli_query($connexion, $query_ve);
    $row_ve = mysqli_fetch_assoc($result_ve);
    $ve_total = $row_ve['total'];

    // Ajouter les données à leurs tableaux respectifs
    $communes[] = $commune;
    $celib_totals[] = $celib_total;
    $mar_totals[] = $mar_total;
    $div_totals[] = $div_total;
    $ve_totals[] = $ve_total;
}


    // Convertir les tableaux PHP en chaînes JSON pour l'utilisation dans JavaScript
    $communes_json = json_encode($communes);
    $celib_totals_json = json_encode($celib_totals);
    $mar_totals_json = json_encode($mar_totals);
    $div_totals_json = json_encode($div_totals);
    $ve_totals_json = json_encode($ve_totals);
    ?>

    // Code JavaScript pour créer le graphique avec les données récupérées
    // Récupérer les données des communes et des totaux depuis PHP
    var communes = <?php echo $communes_json; ?>;
    var celib_totals = <?php echo $celib_totals_json; ?>;
    var mar_totals = <?php echo $mar_totals_json; ?>;
    var div_totals = <?php echo $div_totals_json; ?>;
    var ve_totals = <?php echo $ve_totals_json; ?>;

    // Créer le contexte du graphique
    var ctx = document.getElementById('chart').getContext('2d');

    // Créer le graphique en utilisant Chart.js avec les pourcentages
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: communes,
            datasets: [
                {
                    label: 'Célibataire',
                    data: celib_totals,
                    backgroundColor: '#FFB6C1'
                },
                {
                    label: 'Marié(e)',
                    data: mar_totals,
                    backgroundColor: '#87CEFA'
                },
                {
                    label: 'Divorcé(e)',
                    data: div_totals,
                    backgroundColor: '#FFD700'
                },
                {
                    label: 'Veuf',
                    data: ve_totals,
                    backgroundColor: '#808080'
                }
            ]
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

