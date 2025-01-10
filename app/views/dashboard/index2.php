<?php include '../app/views/layouts/header.php'; ?>

<div class="dashboard">
    <div class="content-header">
        <h1>Tableau de Bord</h1>
        <div class="date-filter">
            <form action="/dashboard" method="GET">
                <input type="date" name="date" value="<?= $date_selected ?>" class="form-control" onchange="this.form.submit()">
            </form>
        </div>
    </div>

    <div class="row">
        <!-- Statistiques générales -->
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-card-title">Recette du jour</div>
                <div class="stat-card-value"><?= number_format($stats['recette_jour'], 0, ',', ' ') ?> Ar</div>
                <div class="stat-card-compare <?= $stats['recette_evolution'] >= 0 ? 'positive' : 'negative' ?>">
                    <?= $stats['recette_evolution'] ?>% par rapport à hier
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-card-title">Bénéfice du jour</div>
                <div class="stat-card-value"><?= number_format($stats['benefice_jour'], 0, ',', ' ') ?> Ar</div>
                <div class="stat-card-compare <?= $stats['benefice_evolution'] >= 0 ? 'positive' : 'negative' ?>">
                    <?= $stats['benefice_evolution'] ?>% par rapport à hier
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-card-title">Trajets effectués</div>
                <div class="stat-card-value"><?= $stats['nombre_trajets'] ?></div>
                <div class="stat-card-subtitle">sur <?= $stats['nombre_vehicules'] ?> véhicules</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-card-title">Chauffeurs actifs</div>
                <div class="stat-card-value"><?= $stats['chauffeurs_actifs'] ?></div>
                <div class="stat-card-subtitle">sur <?= $stats['total_chauffeurs'] ?> chauffeurs</div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Liste des véhicules -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>État des Véhicules</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Véhicule</th>
                                <th>Chauffeur</th>
                                <th>Trajets</th>
                                <th>Recette</th>
                                <th>État</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($vehicules as $vehicule): ?>
                            <tr>
                                <td><?= $vehicule['nomVoiture'] ?></td>
                                <td><?= $vehicule['nomDriver'] ?? 'Non assigné' ?></td>
                                <td><?= $vehicule['nombre_trajets'] ?></td>
                                <td><?= number_format($vehicule['recette'], 0, ',', ' ') ?> Ar</td>
                                <td>
                                    <span class="badge badge-<?= $vehicule['etat'] == 'disponible' ? 'success' : 
                                        ($vehicule['etat'] == 'en_course' ? 'warning' : 'danger') ?>">
                                        <?= ucfirst(str_replace('_', ' ', $vehicule['etat'])) ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Derniers trajets -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Derniers Trajets</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Heure</th>
                                <th>Départ</th>
                                <th>Destination</th>
                                <th>Véhicule</th>
                                <th>Recette</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($derniers_trajets as $trajet): ?>
                            <tr>
                                <td><?= date('H:i', strtotime($trajet['dateHeureDepart'])) ?></td>
                                <td><?= $trajet['lieuDepart'] ?></td>
                                <td><?= $trajet['lieuDestination'] ?></td>
                                <td><?= $trajet['nomVoiture'] ?></td>
                                <td><?= number_format($trajet['recette'], 0, ',', ' ') ?> Ar</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Graphiques -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Évolution des recettes</h3>
                </div>
                <div class="card-body">
                    <canvas id="recettesChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Répartition des trajets</h3>
                </div>
                <div class="card-body">
                    <canvas id="trajetsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Configuration des graphiques
const recettesCtx = document.getElementById('recettesChart').getContext('2d');
new Chart(recettesCtx, {
    type: 'line',
    data: {
        labels: <?= json_encode($graphiques['recettes']['labels']) ?>,
        datasets: [{
            label: 'Recettes',
            data: <?= json_encode($graphiques['recettes']['data']) ?>,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    }
});

const trajetsCtx = document.getElementById('trajetsChart').getContext('2d');
new Chart(trajetsCtx, {
    type: 'pie',
    data: {
        labels: <?= json_encode($graphiques['trajets']['labels']) ?>,
        datasets: [{
            data: <?= json_encode($graphiques['trajets']['data']) ?>,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ]
        }]
    }
});
</script>

<?php include '../app/views/layouts/footer.php'; ?>