<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire d'information</title>
    <link href="assets/css/login-style.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">Entrer vos informations</h1>
        <form id="loginForm" method="POST" action="/accueil">
            <div class="form-group">
                <label for="nomuser" class="form-label">Nombre de fille </label>
                <input type="number" id="nbrfille" name="nombreFille" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="mdp" class="form-label">Nombre de Garcon</label>
                <input type="number" id="nbrgarcon" name="nombreGarcon" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="mdp" class="form-label">Depot</label>
                <input type="number" id="depot" name="montant" class="form-input" required>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">Valider</button>
            </div>
            <a href="/" class="button">retour</a>

        </form>
    </div>
</body>
</html>