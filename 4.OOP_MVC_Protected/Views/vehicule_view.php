<!-- Views/vehicule_view.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Véhicule</title>
</head>

<body>
    <h1>Informations sur le Véhicule</h1>
    <p><?php echo $vehiculeInfo; ?></p>
    <form method="get" action="index.php">
        <button type="submit" name="action" value="afficherVoiture">Afficher Voiture</button>
        <button type="submit" name="action" value="afficherMoto">Afficher Moto</button>
    </form>
</body>

</html>