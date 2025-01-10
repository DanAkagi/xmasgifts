<?php include '../app/views/layouts/header.php'; ?>

<div class="dashboard-container">
    <h1>Tableau de bord Taxibe</h1>
    
    <div class="dashboard-stats">
        <div class="stat-box">
            <h3>Véhicules</h3>
            <p>Nombre total : <?= $totalVoitures ?></p>
            <p>Disponibles aujourd'hui : <?= $voituresDisponibles ?></p>
        </div>
        
        <div class="stat-box">
            <h3>Chauffeurs</h3>
            <p>Nombre total : <?= $totalChauffeurs ?></p>
            <p>En service aujourd'hui : <?= $chauffeursActifs ?></p>
        </div>
        
        <div class="stat-box">
            <h3>Trajets</h3>
            <p>Aujourd'hui : <?= $trajetsAujourdhui ?></p>
            <p>Recette du jour : <?= number_format($recetteJour, 2) ?> €</p>
        </div>
    </div>

    <div class="recent-activities">
        <h2>Activités récentes</h2>
        <table>
            <thead>
                <tr>
                    <th>Véhicule</th>
                    <th>Chauffeur</th>
                    <th>Départ</th>
                    <th>Destination</th>
                    <th>Recette</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($derniersTrajets as $trajet): ?>
                <tr>
                    <td><?= $trajet['nomVoiture'] ?></td>
                    <td><?= $trajet['nomChauffeur'] ?></td>
                    <td><?= $trajet['lieuDepart'] ?></td>
                    <td><?= $trajet['lieuDestination'] ?></td>
                    <td><?= number_format($trajet['recette'], 2) ?> €</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../app/views/layouts/footer.php'; ?>