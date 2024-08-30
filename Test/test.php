<?php
// test.php
namespace MonProjet\Test;

// Inclure les fichiers nécessaires
include_once 'Voiture.php'; // Inclut la classe Voiture du namespace MonProjet\Vehicules
include_once 'Chien.php';   // Inclut la classe Chien du namespace MonProjet\Animaux

// Importer les classes avec use
use MonProjet\Vehicules\Voiture;
use MonProjet\Animaux\Chien;

// Création d'objets
$maVoiture = new Voiture("rouge", "Toyota");
echo $maVoiture->getInfo(); // Affiche: Cette voiture est une Toyota de couleur rouge.

$monChien = new Chien("Rex");
echo $monChien->aboyer(); // Affiche: Rex aboie: Woof!
