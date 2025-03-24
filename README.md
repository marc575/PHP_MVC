# Gestion des clients

Ce projet est une application web PHP qui permet de gérer les utilisateurs et leurs sessions. Il inclut des fonctionnalités d'authentification (connexion, inscription, déconnexion), de gestion des utilisateurs (création, modification, suppression), et de suivi des sessions utilisateur.

## Fonctionnalités

**Authentification et Sécurité** 
    - Système d’inscription et de connexion sécurisé (hashage des mots de passe avec bcrypt). 
    - Gestion des sessions et restrictions d’accès selon les rôles. 

**Administrateur** 
    - Tableau de bord avec un aperçu des utilisateurs enregistrés. 
    - Création, modification, suppression et activation/désactivation des comptes utilisateurs. 
    - Gestion des droits et rôles. 
    - Consultation des logs de connexion. 

**Client** 
    - Inscription et connexion. 
    - Accès à son profil personnel avec possibilité de modification. 
    - Consultation de l’historique de ses connexions. 

## Technologies Utilisées

- **PHP** : Version 8.2.0
- **MySQL** : Version 5.7
- **TailwindCSS** : Version 4.0
- **Autres langages** : HTML5

## Installation

Suivez ces étapes pour installer et configurer le projet localement.

1. **Cloner le dépôt** :
   ```bash
   git clone https://github.com/marc575/PHP_MVC.git
   cd votre-projet
   ```

2. **Configurer la base de données** :
    Créez une base de données MySQL.

    Importez le fichier SQL fourni (si applicable) :
    ```bash
    mysql -u utilisateur -p nom_de_la_base < fichier.sql
    ```

3. **Installer les dépendances** :
    Si vous utilisez Composer, exécutez :
    ```bash
    composer install
    ```

4. **Démarrer le serveur** :
    Si vous utilisez un serveur PHP intégré, exécutez :
    ```bash
    php -S localhost:8000 -t public
    ```

5. **Accéder à l'application** :
    Ouvrez votre navigateur et accédez à http://localhost:8000.

## Utilisation

**Authentification**
    - Inscription : Accédez à http://localhost:8000/auth/register pour créer un nouveau compte.

    - Connexion : Accédez à http://localhost:8000/auth/login pour vous connecter.

    - Déconnexion : Cliquez sur le bouton de déconnexion pour vous déconnecter (http://localhost:8000/logout).

**Gestion des Utilisateurs**
    - Affichage des utilisateurs : Les administrateurs peuvent accéder à la liste des utilisateurs via http://localhost:8000/users/show.

    - Modification d'un utilisateur : Les utilisateurs peuvent modifier leurs informations via http://localhost:8000/user/update?id=:id.

    - Suppression d'un utilisateur : Les administrateurs peuvent supprimer un utilisateur via http://localhost:8000/user/delete?id=:id.

**Gestion des Sessions**
    - Tableau de bord : Les administrateurs et les utilisateurs peuvent accéder au tableau de bord des sessions via http://localhost:8000/logs.

## Structure du Projet
    ```bash
    PHP_MVC/
    ├── app/                  # Contient les contrôleurs, modèles et vues
    │   ├── Controllers/      # Contrôleurs de l'application
    │   ├── Models/           # Modèles de l'application
    │   └── Views/            # Vues de l'application
    │   └── Core/             # Définition des classes parentes
    │   └── Config/           # Fichiers de configuration
    ├── public/               # Fichiers accessibles publiquement (CSS, JS, images)
    ├── vendor/               # Dépendances Composer
    ├── composer.lock         # Fichier de configuration Composer
    ├── composer.json         # Fichier de configuration Composer
    └── README.md             # Ce fichier
    ```

## Contrôleurs

- **AuthController**
    Description : Gère les utilisateurs (connexion, inscription, etc.).

    Méthodes :
    login() : Affiche le formulaire de connexion.
    register() : Affiche le formulaire d'inscription.
    logout() : Deconnexion.
    show() : Affiche la liste des utilisateurs
    update() : Met à jour un utilisateur
    delete() : Supprime un compte

- **SessionController**
    Description : Gère les logs (liste des logs etc.).

    Méthodes :
    show() : Affiche la liste des logs

- **HomeController**

    Méthodes :
    home() : Affiche la page d'accueil.
    notfound() : Affiche page d'erreur 404 (page non trouvé)


## Contribuer
Si vous souhaitez contribuer à ce projet, suivez ces étapes :

- Forkez le projet.

- Créez une branche pour votre fonctionnalité (git checkout -b feature/NouvelleFonctionnalité).

- Committez vos changements (git commit -m 'Ajouter une nouvelle fonctionnalité').

- Pushez la branche (git push origin feature/NouvelleFonctionnalité).

- Ouvrez une Pull Request.

## Licence
Ce projet est sous licence MIT.

## Auteur
Tatchou Marc - https://github.com/marc575/