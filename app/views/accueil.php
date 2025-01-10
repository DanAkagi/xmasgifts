<?php
$categorie = ["garcon", "fille"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisissez les cadeaux pour votre enfant</title>
    <link rel="stylesheet" href="/assets/css/accueil.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <!-- Menu de navigation -->
    <nav>
        <ul>
            <li><a href="#" class="active">Mon panier</a></li>
            <li><a href="#">suppport</a></li>
            <li><a href="#">parametre</a></li>
            <li><a href="/">retour</a></li>
        </ul>
    </nav>

    <h1>Choisissez les cadeaux pour votre enfant</h1>

    <!-- Section des cadeaux -->
    <div class="cadeaux-container">
        <?php
        foreach($categorie as $cat){
            if(!empty($cadeaux[$cat])){
                foreach($cadeaux as $cadeau){
        ?>
            <div class="cadeau-item">
                <img src="<?php echo $cadeau['image_url']; ?>" alt="image de cadeau" class="cadeau-image">
                <p>Nom:<?php echo $cadeau['nomCadeau']; ?></p>
                <p>Genre:<?php echo $cadeau['categorieCadeau']; ?></p>
                <p>Prix:<?php echo $cadeau['prix']; ?></p>
                <button class="ajouter-btn">Ajouter</button>
            </div>
        <?php
                }
            }
        }
        ?>
    </div>
    <!-- <a href="/information-form" class="ajouter-btn">retour</a> -->
</body>
</html>
