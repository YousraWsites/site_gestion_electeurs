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
            max-width: 460px; 
            max-height: 320px;
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
            <a class="menu-item" href="acceuil.php"><img class="icon" src="home.png">Acceuil</a>
           
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
        $query = "SELECT commune, COUNT(*) AS total FROM electeurs GROUP BY commune";
        $result = mysqli_query($connexion, $query);

        // Préparer les données pour le graphique
        $communes = array();
        $totals = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $communes[] = $row['commune'];
            $totals[] = $row['total'];
        }

        // Convertir les tableaux PHP en chaînes JSON pour l'utilisation dans JavaScript
        $communes_json = json_encode($communes);
        $totals_json = json_encode($totals);
        ?>

        // Code JavaScript pour créer le graphique avec les données récupérées
        // Récupérer les données des communes et des totaux depuis PHP
        var communes = <?php echo $communes_json; ?>;
        var totals = <?php echo $totals_json; ?>;

        // Créer le contexte du graphique
        var ctx = document.getElementById('chart').getContext('2d');

        // Créer le graphique en utilisant Chart.js avec les pourcentages
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: communes,
                datasets: [{
                    label: 'Total des enregistrements',
                    data: totals,
                    backgroundColor: [
                        '#417ccd',
                        '#ff6384',
                        '#36a2eb',
                        '#ff9f40',
                        '#9966ff',
                        '#ffcd56',
                    ]
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