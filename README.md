# Projet Symfony: My Money
Ce projet est réalisé dans le cadre de la matière Technologie du web - niveau avancé en L3 MIAGE à l'université Paris 1 Panthéon Sorbonne. 

## Prérequis
Avant de commencer à utiliser le site web, il faut s'assurer d'avoir installé : 
- PHP version 8.2 ou supérieur
- Composer
- MySQL ou tout autre SGDB pris en charge par Symfony.

## Installation
1) Clonez ce dépôt dans votre répertoire local :
```bash
git clone https://github.com/OdeliaCohen/Projet_Dev.git
```
Si vous souhaitez nommer différemment le nom du dossier veuillez ajouter le nom à la suite de la commande comme suit:
```bash
git clone https://github.com/OdeliaCohen/Projet_Dev.git nomProjet
```
2) Accédez au répertoire du projet grâce à la commande suivante:
```bash
cd Projet_Dev
```
ou cd nomProjet si vous l'avez nommé différemment

3) Installez les dépendances PHP en exécutant la commande suivante :
```bash
composer install
```
4) Configurez votre base de données dans le fichier .env.local en modifiant la variable DATABASE_URL.
   
5) Créez la base de données et exécutez les migrations pour créer le schéma de base de données :
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```
Veuillez exécuter cette commande 
```bash
composer require stof/doctrine-extensions-bundle
```

## Se connecter
Pour se connecter à l'application, rendez vous dans l'URL localhost/Projet_Dev/public (veuillez à changer le *Projet_Dev* en fonction de ce que vous avez nommé le dossier) pour accéder à la page d'accueil. 
Puis, rendez vous à la page signUp et entrez un email, un mot de passe ainsi que les autres informations demandées pour vous inscrire. 
Enfin, connectez vous à l'aide de l'email et du mot de passe que vous avez saisi lors de l'inscription. 

## Liens
Pour accéder à l'outil de gestion de sprints : 
https://trello.com/invite/b/p7t3LjJF/ATTIf65cd8117f6df0c9e642ebe7d68632053C011377/projetweb

Pour accéder à l'export de la base de données (format .SQL): 
https://drive.google.com/drive/home?ths=true

## Technologies utilisées
- Symfony: framework PHP pour le développement web suivant le MVC
- HTML, CSS, JavaScript
- Twig: moteur de templates
- Bootstrap, Axentis: framework CSS
- ChartJs: bibliothèque JS pour créer des graphiques et des diagrammes interactifs
- Figma: maquette
- Trello: gestion des sprints

## Diagramme de classe
https://drive.google.com/file/d/1YafIr09eZtlq76C55Xby-WIm27O4mOxK/view?usp=sharing

## Fondatrices
Odelia COHEN - Sara BEN ABDELKADER - Sara SERHAL 




