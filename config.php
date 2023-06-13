<?php
return [
    'database' => [
        'host' => 'localhost'
        'name' => 'prj-prism-rfrome2',
        'login' => 'root',
        'password' => ''
    ],
    'aliases' => [
        // Les alias permettent au modèle Objet d'appeler les instances de classes sans que l'on ai à
        // adapter le code existant.
        'Alignement' => \app\Models\Alignement::class,
        'Equipe' => \app\Models\Equipe::class,
        'Expression' => \app\Models\Expression::class,
        'GroupeLangue' => \app\Models\GroupeLangue::class,
        'Langue' => \app\Models\Langue::class,
        'Partie' => \app\Models\Partie::class,
        'Pays' => \app\Models\Pays::class,
        'Question' => \app\Models\Question::class,
        'Reponse' => \app\Models\Reponse::class,
        'Theme' => \app\Models\Theme::class,
        'Utilisateur' => \app\Models\Utilisateur::class
    ]
];