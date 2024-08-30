# README - Introduction à la Programmation Orientée Objet (POO) et au Modèle-Vue-Contrôleur (MVC) en PHP

Ce projet est un exemple d'application utilisant la Programmation Orientée Objet (POO) et le modèle Modèle-Vue-Contrôleur (MVC) en PHP. Ce guide te fournira une vue d'ensemble des concepts clés et comment ils sont implémentés dans le code.

## 1. **Introduction à la Programmation Orientée Objet (POO)**

### Qu'est-ce que la POO ?

La Programmation Orientée Objet est une méthode de programmation qui organise le code autour des objets. Un objet est une instance d'une "classe", qui définit les attributs et les comportements communs. La POO aide à modéliser des concepts du monde réel de manière plus intuitive et structurée.

### Concepts de Base

- **Classe** : Un plan ou un modèle pour créer des objets. Elle définit des propriétés (caractéristiques) et des méthodes (actions).
- **Objet** : Une instance concrète d'une classe. Par exemple, une voiture spécifique, comme une Toyota rouge.
- **Propriétés** : Les attributs d'un objet, comme la couleur et le modèle d'une voiture.
- **Méthodes** : Les fonctions définies dans une classe, qui décrivent les actions qu'un objet peut effectuer.

### Exemple de Classe en PHP

```php
<?php
namespace MonProjet\Models;

class Voiture {
    public string $couleur;
    public string $marque;

    public function __construct(string $couleur, string $marque) {
        $this->couleur = $couleur;
        $this->marque = $marque;
    }

    public function getInfo(): string {
        return "Cette voiture est une {$this->marque} de couleur {$this->couleur}.";
    }
}
```

Dans cet exemple, `Voiture` est une classe avec deux propriétés (`couleur`, `marque`) et une méthode (`getInfo()`).

## 2. **Introduction au Modèle-Vue-Contrôleur (MVC)**

### Qu'est-ce que le MVC ?

Le modèle Modèle-Vue-Contrôleur (MVC) est une architecture logicielle qui sépare les responsabilités en trois parties :

- **Modèle** : Gère les données et la logique d'affaires. Les classes définissant les données des objets sont ici.
- **Vue** : Affiche les données à l'utilisateur. Ce sont les fichiers HTML/PHP qui présentent les informations.
- **Contrôleur** : Gère les interactions de l'utilisateur et relie les modèles et les vues.

### Structure du Projet

- **Modèles** : Contiennent les classes représentant les données. Par exemple, `Voiture.php` et `Chien.php`.
- **Vues** : Contiennent le code HTML pour afficher les données. Par exemple, `voiture_view.php` et `chien_view.php`.
- **Contrôleurs** : Contiennent la logique pour interagir avec les modèles et les vues. Par exemple, `VehiculeController.php` et `AnimalController.php`.

### Exemple de Contrôleur

```php
<?php
namespace MonProjet\Controllers;

use MonProjet\Models\Voiture;

class VehiculeController {
    public function afficherVoiture() {
        // Crée un objet Voiture
        $voiture = new Voiture("rouge", "Toyota");

        // Obtenir les informations sur la voiture
        return $voiture->getInfo();
    }
}
```

Ce contrôleur crée une instance de `Voiture`, obtient les informations et les retourne.

### Exemple de Vue

```html
<!-- resources/views/voiture_view.php -->
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <title>Voiture</title>
  </head>
  <body>
    <h1>Informations sur la voiture</h1>
    <p><?php echo $voitureInfo; ?></p>
  </body>
</html>
```

Cette vue affiche les informations sur la voiture, fournies par le contrôleur.

### Exemple de Contrôleur pour le Chien

```php
<?php
namespace MonProjet\Controllers;

use MonProjet\Models\Chien;

class AnimalController {
    public function afficherChien() {
        // Crée un objet Chien
        $chien = new Chien("Rex");
        // Appel de la méthode aboyer pour obtenir l'information
        return $chien->aboyer();
    }
}
```

Ce contrôleur crée une instance de `Chien`, obtient l'information sur le chien, et la retourne.

### Exemple de Vue pour le Chien

```html
<!-- resources/views/chien_view.php -->
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <title>Chien</title>
  </head>
  <body>
    <h1>Informations sur le chien</h1>
    <p><?php echo $chienInfo; ?></p>
  </body>
</html>
```

Cette vue affiche les informations sur le chien, fournies par le contrôleur.

## 3. **Utilisation du Code**

### Structure des Fichiers

- **Controllers/** : Contient les contrôleurs (`VehiculeController.php`, `AnimalController.php`).
- **Models/** : Contient les modèles (`Voiture.php`, `Chien.php`).
- **Views/** : Contient les vues (`voiture_view.php`, `chien_view.php`).
- **index.php** : Le point d'entrée principal du projet.

### Exemple d'index.php

```php
<?php
// Inclure les contrôleurs nécessaires
require_once 'Controllers/VehiculeController.php';
require_once 'Controllers/AnimalController.php';

// Inclure les modèles nécessaires
require_once 'Models/Chien.php';
require_once 'Models/Voiture.php';

use MonProjet\Controllers\VehiculeController;
use MonProjet\Controllers\AnimalController;

// Crée les instances des contrôleurs
$vehiculeController = new VehiculeController();
$animalController = new AnimalController();

// Récupérer les actions des requêtes GET
$vehiculeAction = $_GET['vehiculeAction'] ?? 'afficherVoiture';
$animalAction = $_GET['animalAction'] ?? 'afficherChien';

// Gestion des véhicules
if ($vehiculeAction == 'afficherVoiture') {
    $voitureInfo = $vehiculeController->afficherVoiture();
    include_once 'Views/voiture_view.php';
}

// Gestion des animaux
if ($animalAction == 'afficherChien') {
    $chienInfo = $animalController->afficherChien();
    include_once 'Views/chien_view.php';
}
```

Ce fichier principal détermine quel contrôleur utiliser en fonction des actions demandées par l'utilisateur et inclut la vue appropriée.

## 4. **Points Clés**

- **Namespaces** : Utilisés pour organiser le code en évitant les conflits de noms. Chaque fichier PHP peut définir son propre espace de noms.
- **`use`** : Permet d'importer des classes d'un namespace spécifique pour les utiliser plus facilement.
- **Separation of Concerns** : Le MVC aide à maintenir une séparation claire entre les données (Modèle), la logique (Contrôleur) et l'affichage (Vue).

Avec ce projet, tu devrais avoir une compréhension claire de la POO et du MVC en PHP, ainsi que de la manière de structurer une application en utilisant ces concepts.
