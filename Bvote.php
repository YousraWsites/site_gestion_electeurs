<?php include("head.php"); ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
    .dashboard-card1 {
        background-color: transparent;
        transition: transform 0.3s ease;
        cursor: pointer;
        height: 160px;
        width: 250px;
        margin-top: 130px;
       
        border: none;
       margin-left:100px;
    }
    .dashboard-card2 {
        background-color: transparent;
        transition: transform 0.3s ease;
        cursor: pointer;
        height: 160px;
        width: 250px;
        margin-top: 130px;
       
        border: none;
       
       
    }

    .dashboard-card1:hover {
        transform: scale(1.05);
    }
    .dashboard-card2:hover {
        transform: scale(1.05);
    }

    .dashboard-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 5px;
    }

    .dashboard-card-title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-weight: bold;
        font-size: 24px;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .dashboard-card-content {
        display: none;
        padding: 20px;
        color: #000;
    }

   
    
</style>
<div class="menu">
            <a class="menu-item" href="inscription.php"><img class="icon" src="inscriptionim.png">Nouvelle Inscription</a>
            <a class="menu-item" href="Modsup.php"><img class="icon" src="modifsupp.png">Gestion des electeurs</a>
         
            <a class="menu-item" href="Bvote.php"><img class="icon" src="desk.png">Bureaux de Vote</a>
            <a class="menu-item" href="Statistique.php"><img class="icon" src="stat.png">Statistique</a>
            <a class="menu-item" href="recherche.php"><img class="icon" src="rech.png">Rechercher</a>
            <a class="menu-item" href="deconnexion.php"><img class="icon" src="logout.png">Déconnexion</a>

        </div>

    <div class="row">
    <div class="col-md-6">
    <a href="ecole5.php"> <!-- Added anchor tag with the desired page URL -->
        <div class="card dashboard-card1" onclick="toggleDashboardCard(this)">
            <img class="dashboard-card-image" src="image1.jpg" alt="Image Écoles">
            <h5 class="card-title dashboard-card-title">Écoles</h5>
            <div class="dashboard-card-content">
                <!-- Contenu de la carte des écoles -->
                <p>Liste des écoles</p>
                <ul>
                    <li>École 1</li>
                    <li>École 2</li>
                    <li>École 3</li>
                </ul>
            </div>
        </div>
    </a>
</div>
<div class="col-md-6">
    <a href="commune5.php"> <!-- Added anchor tag with the desired page URL -->
        <div class="card dashboard-card2" onclick="toggleDashboardCard(this)">
            <img class="dashboard-card-image" src="image2.jpg" alt="Image Communes">
            <h5 class="card-title dashboard-card-title">Communes</h5>
            <div class="dashboard-card-content">
                <!-- Contenu de la carte des communes -->
                <p>Liste des communes</p>
                <ul>
                    <li>Commune 1</li>
                    <li>Commune 2</li>
                    <li>Commune 3</li>
                </ul>
            </div>
        </div>
    </a>
</div>

        </div>
    </div>

<script>
    function toggleDashboardCard(card) {
        card.classList.toggle("active");
    }
</script>
</body>
</html>

