<?php include '../app/views/layouts/header.php'; ?>

<div class="content-header">
    <h1>Liste des Dépôts</h1>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID user</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listeDepots as $depot): ?>
                <tr>
                    <td><?= $depot['idUser'] ?></td>
                    <td><?= $depot['depot'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../app/views/layouts/footer.php'; ?>