# Languame

Les fichiers index.html et index-en.html sont la base de la carte.

Le fichier mapdata.js contient la fonction permettant d'afficher les capitales sur la carte.

Le fichier worldmap.js contient toutes les fonctions permettant de faire fonctionner la carte, il ne faut pas y toucher.

# Information au sujet du nouveau routeur

Le nouveau routeur permet l'usage des chemins de l'url pour naviguer dans le site. 
Par exemple, si vous voulez accéder à la page des utilisateurs, vous pourriez configurer `/users` au lieu de `/index.php?cible=Utilisateur&action=listAll`.

Vous trouvez dans le fichier `web.php` des exemples de route. Tous les routeurs sont toujours importés à la racine du site internet.