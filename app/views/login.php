<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="assets/css/login-style.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">Connexion</h1>
        <form id="loginForm" method="POST" action="/information-form">
            <div class="form-group">
                <label for="nomuser" class="form-label">Nom d'utilisateur</label>
                <input type="text" id="nomuser" name="nomuser" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="mdp" class="form-label">Mot de passe</label>
                <input type="password" id="mdp" name="mdp" class="form-input" required>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">Se connecter</button>
            </div>
            <a href="/register" class="register-link">Vous n'avez pas de compte ? Inscrivez-vous</a>
        </form>
    </div>
</body>
</html>