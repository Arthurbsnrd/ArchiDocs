# ArchiDocs

Bienvenue sur le projet ArchiDocs, un projet d'application web qui permet aux clients d'un cabinet d'architecte de stocker leurs fichiers et de les gérer. Le projet est basé sur PHP pour le backend et sur HTML, CSS et JavaScript pour le frontend.
Plusieurs aspect sont abordés dans ce projet notamment la gestion des accès, la sécurité et le bon fonctionnement des fonctionnalités du site.


## Démarrage

Pour pouvoir démarrer le projet, vous devez avoir PHP au minimum sur votre ordinateur.
Ensuite, vous devez récupérer la base de données qui est dans le fichier archidocs.sql.
Ensuite il suffit de vous inscrire pour avoir un accès et passer votre role à "admin" qui vous voulez avoir tout les droit.


## Auteurs

* **EL KHIAT Anas** _alias_ [@Anas7823](https://github.com/Anas7823)
* **ELOUAKILI Fatima zahra** _alias_ [@fze04](https://github.com/fze04)
* **BESNARD Arthur** _alias_ [@Arthurbsnrd](https://github.com/Arthurbsnrd)


## Erreur possible

Si vous avez une erreur de type: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: NO)
Configurer le fichier bdd.php avec les informations de connexion à la base de données.


## Comment fonctionne nos PDF ??

Pour générer un PDF de facture, nous utilisons Dompdf.
Dompdf est un package PHP qui permet de générer des PDF à partir de HTML. Dans notre cas notre squelette est le suivant: factureSquelette.php
Dans se squelette, nous utilisons les données de l'utilisateur connecté qui fait l'achat puis les affichons dans le PDF.
Le PDF est ensuite sauvegardé dans le dossier facturesClient.