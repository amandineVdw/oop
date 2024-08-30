### **README : Utilisation de protected dans une Architecture OOP - MVC en PHP**
Pour l'exercice suivant sur la notion de **`protected`** dans une structure **OOP-MVC**, nous allons approfondir l'utilisation des niveaux d'accès des propriétés et méthodes en PHP. Cet exercice se construit comme une suite logique de l'exercice précédent sur les propriétés **`private`** et l'utilisation des **getters** et **setters**.

### **Objectif de l'Exercice**

- Comprendre la notion de **`protected`**.
- Apprendre comment le modifier permet de restreindre l'accès aux propriétés et méthodes tout en permettant l'accès dans les classes dérivées.
- Mettre en place une structure MVC pour illustrer ce concept dans un contexte pratique.

### **Contexte**

Nous allons étendre notre exemple précédent avec les classes **`Vehicule`**, **`Voiture`**, et **`Moto`**, et introduire une nouvelle classe dérivée pour montrer l'accès des membres **`protected`**. Nous allons aussi ajuster la structure MVC pour intégrer ce concept.

### **1. Qu'est-ce que `protected` ?**

- **`protected`** : Permet l'accès aux propriétés et méthodes dans la classe où elles sont définies ainsi que dans les classes dérivées (sous-classes). Contrairement à **`private`**, les membres **`protected`** ne sont pas accessibles en dehors de ces classes, mais ils le sont dans les classes héritées.

### **2. Structure de l'Exercice**

Nous allons modifier notre structure de projet pour intégrer la notion **`protected`** dans nos classes, tout en suivant la structure MVC.

### **Structure des Dossiers :**

```
4.OOP_MVC_Protected/
│
├── Controllers/
│   └── VehiculeController.php
│
├── Models/
│   ├── Vehicule.php
│   ├── Voiture.php
│   └── Moto.php
│
├── Views/
│   └── vehicule_view.php
│
└── index.php
```

### **Modèles : Implémentation du Protected**

#### **Modèle de Base : `Vehicule`**

Nous allons déclarer certaines propriétés comme **`protected`** pour permettre l'accès dans les sous-classes mais pas en dehors.

```php
<?php
// Models/Vehicule.php
namespace MonProjet\Models;

class Vehicule {
    protected string $marque;
    protected string $modele;

    public function __construct(string $marque, string $modele) {
        $this->marque = $marque;
        $this->modele = $modele;
    }

    public function getInfo(): string {
        return "Marque: {$this->marque}, Modèle: {$this->modele}";
    }
}

```

#### **Classe Étendue : `Voiture`**

**`Voiture`** hérite de **`Vehicule`** et accède aux propriétés **`protected`** directement.

```php
<?php
// Models/Voiture.php
namespace MonProjet\Models;

class Voiture extends Vehicule {
    protected int $nombrePortes;

    public function __construct(string $marque, string $modele, int $nombrePortes) {
        parent::__construct($marque, $modele);
        $this->nombrePortes = $nombrePortes;
    }

    public function getInfo(): string {
        // Accès direct aux propriétés protected
        return parent::getInfo() . ", Nombre de portes: {$this->nombrePortes}";
    }
}

```

#### **Classe Étendue : `Moto`**

**`Moto`** utilise également les propriétés **`protected`** de **`Vehicule`**.

```php
<?php
// Models/Moto.php
namespace MonProjet\Models;

class Moto extends Vehicule {
    protected bool $aCarter;

    public function __construct(string $marque, string $modele, bool $aCarter) {
        parent::__construct($marque, $modele);
        $this->aCarter = $aCarter;
    }

    public function getInfo(): string {
        return parent::getInfo() . ", Avec carter: " . ($this->aCarter ? "Oui" : "Non");
    }
}

```

### **Contrôleurs :**

#### **Contrôleur pour les Véhicules : `VehiculeController`**

Le contrôleur reste similaire mais montre comment les informations sont récupérées à partir des modèles.

```php
<?php
// Controllers/VehiculeController.php
namespace MonProjet\Controllers;

use MonProjet\Models\Voiture;
use MonProjet\Models\Moto;

class VehiculeController {
    public function afficherVoiture(): string {
        $voiture = new Voiture("Toyota", "Corolla", 4);
        return $voiture->getInfo();
    }

    public function afficherMoto(): string {
        $moto = new Moto("Kawasaki", "Ninja", true);
        return $moto->getInfo();
    }
}

```

### **Vues :**

#### **Vue pour les Véhicules : `vehicule_view.php`**

Une simple vue pour afficher les informations des véhicules.
Ajout des boutons pour naviguer entre l'affichage des voitures et des motos.

```php
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
```

### **Index Principal : `index.php`**

```php
<?php
require_once 'Controllers/VehiculeController.php';
require_once 'Models/Vehicule.php';
require_once 'Models/Voiture.php';
require_once 'Models/Moto.php';

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

```

### **Résumé et Explication**

1. **Propriétés Protected** : Elles sont utilisées pour illustrer comment les classes enfants peuvent accéder aux membres des classes parentes tout en les gardant cachés du monde extérieur.

2. **Avantages de `protected`** :
   - Permet de maintenir une encapsulation partielle en exposant les propriétés uniquement aux classes dérivées.
   - Encourage une conception orientée objet propre, en minimisant les risques de modifications involontaires des propriétés sensibles.

Cet exercice t'aide à mieux comprendre l'utilisation et l'intérêt des membres **`protected`** dans une architecture MVC en PHP. Si tu as d'autres questions ou souhaites explorer davantage, n'hésite pas à demander !
