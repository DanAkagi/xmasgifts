<?php include '../app/views/layouts/header.php'; ?>

<div class="container mt-5">
    <div class="content-header text-center">
        <h1 class="mb-4">Liste des Dépôts</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <?php if (!empty($listeDepots)) { ?>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID user</th>
                            <th>Montant</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listeDepots as $depot): ?>
                            <tr>
                                <td><?= $depot['idUser'] ?></td>
                                <td><?= $depot['montant'] ?></td>
                                <td>
                                    <form action="accept-depot" method="post">
                                        <input type="hidden" name="id" value="<?= $depot['idUser'] ?>"/>
                                        <input type="hidden" name="montant" value="<?= $depot['montant'] ?>"/>
                                        <button type="submit" class="btn btn-success btn-sm">Accepter</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p class="text-muted">Aucun dépôt disponible.</p>
            <?php } ?>
        </div>
    </div>
</div>

<?php include '../app/views/layouts/footer.php'; ?>