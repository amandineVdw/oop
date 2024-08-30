<?php
// Inclure les contrôleurs nécessaires
require_once 'Controllers/VehiculeController.php';
require_once 'Controllers/AnimalController.php';

// Inclure les modèles nécessaires
require_once 'Models/Chien.php';
require_once 'Models/Voiture.php';

use MonProjet\Controllers\VehiculeController;
use MonProjet\Controllers\AnimalController;

// Définir les contrôleurs pour les véhicules et les animaux
// Crée les instances des contrôleurs
$vehiculeController = new VehiculeController();
$animalController = new AnimalController();

// Récupérer les actions des requêtes GET
$vehiculeAction = $_GET['vehiculeAction'] ?? 'afficherVoiture';
$animalAction = $_GET['animalAction'] ?? 'afficherChien';

// Gestion des véhicules
if ($vehiculeAction == 'afficherVoiture') {
    // Appel de la méthode afficherVoiture du contrôleur des véhicules
    $voitureInfo = $vehiculeController->afficherVoiture();
    // Inclure la vue appropriée pour les véhicules
    include_once 'Views/voiture_view.php';
}

// Gestion des animaux
if ($animalAction == 'afficherChien') {
    // Appel de la méthode afficherChien du contrôleur des animaux
    $chienInfo = $animalController->afficherChien();
    // Inclure la vue appropriée pour les animaux
    include_once 'Views/chien_view.php';
}