<?php include("head.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>etatscol</title>
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

    
    $query_au = "SELECT commune, COUNT(*) AS total FROM electeurs WHERE Niveau_scolaire = 'aucun بدون' GROUP BY commune";
    $result_au = mysqli_query($connexion, $query_au);


    $query_pri = "SELECT commune, COUNT(*) AS total FROM electeurs WHERE Niveau_scolaire = 'Primaire ابتدائي' GROUP BY commune";
    $result_pri = mysqli_query($connexion, $query_pri);


    $query_col = "SELECT commune, COUNT(*) AS total FROM electeurs WHERE Niveau_scolaire = 'College اعدادي' GROUP BY commune";
    $result_col = mysqli_query($connexion, $query_col);

   
    $query_ly= "SELECT commune, COUNT(*) AS total FROM electeurs WHERE Niveau_scolaire = 'Lycée ثانوي' GROUP BY commune";
    $result_ly = mysqli_query($connexion, $query_ly);
 
    $query_su = "SELECT commune, COUNT(*) AS total FROM electeurs WHERE Niveau_scolaire = 'Supérieur عالي ' GROUP BY commune";
    $result_su= mysqli_query($connexion, $query_su);

    // Préparer les données pour le graphique
    $communes = array();
    $au_totals = array();
    $pri_totals = array();
    $col_totals = array();
    $ly_totals = array();
    $su_totals = array();

    while ($row = mysqli_fetch_assoc($result_au)) {
        $communes[] = $row['commune'];
        $au_totals[] = $row['total'];
    }

    while ($row = mysqli_fetch_assoc($result_pri)) {
        $pri_totals[] = $row['total'];
    }

    while ($row = mysqli_fetch_assoc($result_col)) {
        $col_totals[] = $row['total'];
    }

    while ($row = mysqli_fetch_assoc($result_ly)) {
        $ly_totals[] = $row['total'];
    }
    while ($row = mysqli_fetch_assoc($result_su)) {
        $su_totals[] = $row['total'];
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
$au_totals = array();
$pri_totals = array();
$col_totals = array();
$ly_totals = array();
$su_totals = array();

// Parcourir toutes les communes
while ($row_commune = mysqli_fetch_assoc($result_communes)) {
    $commune = $row_commune['commune'];

    // Requête pour obtenir le total des enregistrements célibataires par commune
    $query_au = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND Niveau_scolaire = 'aucun بدون'";
    $result_au = mysqli_query($connexion, $query_au);
    $row_au = mysqli_fetch_assoc($result_au);
    $au_total = $row_au['total'];

    // Requête pour obtenir le total des enregistrements mariés par commune
    $query_pri = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND Niveau_scolaire = 'Primaire ابتدائي'";
    $result_pri = mysqli_query($connexion, $query_pri);
    $row_pri = mysqli_fetch_assoc($result_pri);
    $pri_total = $row_pri['total'];

    // Requête pour obtenir le total des enregistrements divorcés par commune
    $query_col = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND Niveau_scolaire = 'College اعدادي'";
    $result_col = mysqli_query($connexion, $query_col);
    $row_col = mysqli_fetch_assoc($result_col);
    $col_total = $row_col['total'];

    // Requête pour obtenir le total des enregistrements veufs par commune
    $query_ly = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND Niveau_scolaire = 'Lycée ثانوي'";
    $result_ly = mysqli_query($connexion, $query_ly);
    $row_ly = mysqli_fetch_assoc($result_ly);
    $ly_total = $row_ly['total'];
    // Requête pour obtenir le total des enregistrements veufs par commune
    $query_su = "SELECT COUNT(*) AS total FROM electeurs WHERE commune = '$commune' AND Niveau_scolaire = 'Supérieur عالي '";
    $result_su = mysqli_query($connexion, $query_su);
    $row_su = mysqli_fetch_assoc($result_su);
    $su_total = $row_su['total'];

    // Ajouter les données à leurs tableaux respectifs
    $communes[] = $commune;
    $au_totals[] = $au_total;
    $pri_totals[] = $pri_total;
    $col_totals[] = $col_total;
    $ly_totals[] = $ly_total;
    $su_totals[] = $su_total;
    

    

}


    // Convertir les tableaux PHP en chaînes JSON pour l'utilisation dans JavaScript
    $communes_json = json_encode($communes);
    $au_totals_json = json_encode($au_totals);
    $pri_totals_json = json_encode($pri_totals);
    $col_totals_json = json_encode($col_totals);
    $ly_totals_json = json_encode($ly_totals);
    $su_totals_json = json_encode($su_totals);
    ?>

    // Code JavaScript pour créer le graphique avec les données récupérées
    // Récupérer les données des communes et des totaux depuis PHP
    var communes = <?php echo $communes_json; ?>;
    var au_totals = <?php echo $au_totals_json; ?>;
    var pri_totals = <?php echo $pri_totals_json; ?>;
    var col_totals = <?php echo $col_totals_json; ?>;
    var ly_totals = <?php echo $ly_totals_json; ?>;
    var su_totals = <?php echo $su_totals_json; ?>;

    // Créer le contexte du graphique
    // Créer le contexte du graphique
var ctx = document.getElementById('chart').getContext('2d');

// Créer le graphique en utilisant Chart.js
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: communes, // Les noms des communes
        datasets: [
            {
                label: 'Aucun',
                data: au_totals, // Les totaux pour le niveau scolaire "Aucun"
                backgroundColor: '#FFB6C1	'
            },
            {
                label: 'Primaire',
                data: pri_totals, // Les totaux pour le niveau scolaire "Primaire"
                backgroundColor: 'yellow'
               
           
            },
            {
                label: 'College',
                data: col_totals, // Les totaux pour le niveau scolaire "Primaire"
                backgroundColor: '#87CEFA'
               
           
            },
            {
                label: 'Lycee',
                data: ly_totals, // Les totaux pour le niveau scolaire "Primaire"
                backgroundColor: '#FFD700'
               
           
            },
            {
                label: 'Superieur',
                data: su_totals, // Les totaux pour le niveau scolaire "Primaire"
                backgroundColor: '#808080'
               
           
            },
            // Ajoutez d'autres datasets pour les autres niveaux scolaires (college, lycee, superieur) en suivant le même schéma
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
