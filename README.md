# Symfony - Gestion des Entreprises et Employés

## 📋 Contexte du Projet
Ce projet est une application permettant de gérer des entreprises et leurs employés. Il a pour objectif principal de se **familiariser avec l'environnement Symfony 7** et ses fonctionnalités de base.

## 🎯 Objectifs Pédagogiques
- Découvrir et configurer un projet Symfony 7.
- Configurer une base de données via le **CLI Symfony**.
- Comprendre le système de création des **entités** avec Doctrine.
- Utiliser **Twig** comme moteur de template pour l'affichage des vues.
- Manipuler la base de données avec **DQL** et le Repository de Doctrine.
- Gérer l'affichage, l'ajout, la modification et la suppression des données.

## 🛠 Prérequis
Avant de commencer, assurez-vous d'avoir installé :
- [PHP 8.2+](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [Symfony CLI](https://symfony.com/download)
- Un serveur de base de données (MySQL, PostgreSQL, SQLite, HeidiSQL...)
- Un serveur web comme Apache ou Nginx, ou utiliser le serveur Symfony (symfony server:start)

## 🚀 Installation
### 1. Cloner le dépôt
```bash
 git clone https://github.com/Estherlvn/Introduction_Symfony
 cd Introduction_Symfony
```

### 2. Installer les dépendances
```bash
composer install
```

### 3. Configurer l'environnement
Depuis le fichier `.env`, configurez votre base de données :
```ini
DATABASE_URL="mysql://user:password@127.0.0.1:3306/nom_de_la_base"
```

### 4. Créer la base de données et exécuter les migrations
```bash
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate
```

### 5. Lancer le serveur Symfony
```bash
symfony serve -d
```
L'application sera accessible sur [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 📂 Structure du Projet
```
├── src/
│   ├── Controller/   # Contrôleurs Symfony
│   ├── Entity/       # Entités Doctrine
│   ├── Repository/   # Repositories pour interagir avec la BDD
│   ├── Form/         # Formulaires Symfony
├── templates/        # Vues Twig
├── public/           # Dossier accessible publiquement
├── migrations/       # Migrations Doctrine
├── .env              # Configuration de l'environnement
└── ...
```

## ✨ Fonctionnalités
- **Gestion des entreprises** :
  - Création, modification, suppression
  - Affichage des entreprises et de leurs employés associés
- **Gestion des employés** :
  - Ajout, modification, suppression
  - Filtrage par entreprise
- **Utilisation de Twig** pour l'affichage dynamique
- **DQL** pour l'interrogation de la base de données

## 📖 Ressources utiles
- [Documentation Symfony](https://symfony.com/doc/current/index.html)
- [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html)
- [Twig](https://twig.symfony.com/)

---
**Auteur** : [Estherlvn] 

