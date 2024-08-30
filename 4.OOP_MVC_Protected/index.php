<?php
// Inclure les fichiers des contrôleurs et des modèles nécessaires
require_once 'Controllers/VehiculeController.php';
require_once 'Models/Vehicule.php';
require_once 'Models/Voiture.php';
require_once 'Models/Moto.php';

// Utiliser les namespaces pour les contrôleurs
use MonProjet\Controllers\VehiculeController;

$vehiculeController = new VehiculeController();
$action = $_GET['action'] ?? 'afficherVoiture';

if ($action == 'afficherVoiture') {
    $vehiculeInfo = $vehiculeController->afficherVoiture();
    include_once 'Views/vehicule_view.php';
} elseif ($action == 'afficherMoto') {
    $vehiculeInfo = $vehiculeController->afficherMoto();
    include_once 'Views/vehicule_view.php';
} else {
    echo "Action non reconnue.";
}