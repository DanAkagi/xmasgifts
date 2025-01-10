<?php include '../app/views/layouts/header.php'; ?>

<div class="auth-container">
    <div class="auth-box">
        <h2>Connexion</h2>
        
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form action="/login" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>

        <div class="auth-links">
            <a href="/forgot-password">Mot de passe oublié ?</a>
        </div>
    </div>
</div>

<?php include '../app/views/layouts/footer.php'; ?>