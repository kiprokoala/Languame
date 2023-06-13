# Languame

Les fichiers index.html et index-en.html sont la base de la carte.

Le fichier mapdata.js contient la fonction permettant d'afficher les capitales sur la carte.

Le fichier worldmap.js contient toutes les fonctions permettant de faire fonctionner la carte, il ne faut pas y toucher.

# Informations techniques
## Routeur
Le projet met en œuvre un routeur fonctionnant avec des URL absolues. Cela signifie que le projet doit être situé à la 
racine du serveur web. Le routeur permet de définir quelle méthode de quel contrôleur appeler pour chaque adresse.

Exemples d'utilisation du routeur :
```php
Route::get('/', [controllerHome::class, 'index']);
Route::get('/alignement/home', [controllerAlignement::class, 'home']);
```

## Helper config
Le projet comprend également un "helper" qui permet d'accéder aux données du fichier de configuration. Le fichier de configuration est en réalité une simple liste PHP indexée, et on utilise les points pour accéder aux différents index.

Exemple d'utilisation du helper 'config' :
```php
config("database.host");
config("aliases.Partie");
```

## Architecture
Le projet suit une structure similaire à Laravel, où les templates, les scripts JavaScript, les images et les feuilles de style CSS sont regroupés dans le dossier `/resources`, et les tests dans `/test`. On utilise PHPUnit via le gestionnaire de paquets Composer.

## Modèles de données
Les modèles de données doivent être placés dans le dossier `/app/Models`.

Suite à une réorganisation du projet, le fichier de configuration du site référence les alias des modèles vers leurs espaces de noms (namespace). Cela signifie que si un nouveau modèle de données est créé dans le projet, il doit être référencé dans l'index 'aliases' du fichier config.php de la manière suivante :
```php
'Utilisateur' => \app\Models\Utilisateur::class,
'Partie' => \app\Models\Partie::class
```