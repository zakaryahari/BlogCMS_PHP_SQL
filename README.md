# 📝 BlogCMS
### Rapport de Finalisation du Projet Web Dynamique
**Système de Gestion de Contenu Multi-Rôles – BlogCMS**

---

## 🎯 Résumé Exécutif
Ce document atteste de la finalisation du projet **BlogCMS**, une application web complète dédiée à la **gestion éditoriale et à la publication d'articles de blog**.

L'objectif était de développer une solution **Back-End robuste en PHP natif**, capable de gérer des flux de travail éditoriaux complexes (rédaction, validation, publication) et offrant une **ségrégation stricte des droits d'accès** via un système de rôles. Le cœur du projet repose sur une **architecture MVC simplifiée** et une base de données **MySQL relationnelle**.

---

## 🛠️ Achèvements Techniques Clés (Logique et Interface)

### 1. 🔐 Authentification et Sécurité des Accès
- **Système de Connexion Sécurisé** : Implémentation d'une vérification stricte des identifiants avec hachage des mots de passe (`password_verify`) pour garantir l'intégrité des comptes.
- **Gestion des Sessions** : Protection des routes sensibles (`/admin`) via une vérification systématique de la session active et du rôle de l'utilisateur.
- **Hiérarchie des Rôles** : Distinction claire des privilèges entre **Administrateurs** (accès total), **Auteurs** (gestion de leurs propres contenus) et **Visiteurs** (lecture seule et commentaires).

### 2. 💾 Gestion des Données et Opérations CRUD
- **Architecture BDD Relationnelle** : Conception d'un schéma SQL optimisé comprenant **4 tables interconnectées** (utilisateurs, articles, catégories, commentaires) avec contraintes d'intégrité (clés étrangères).
- **CRUD Complet** : Développement des fonctionnalités de Création, Lecture, Mise à jour et Suppression pour les articles et les catégories via des **requêtes SQL préparées (PDO)** pour éviter les injections SQL.
- **Traitement de Données de Masse** : Intégration réussie de jeux de données complexes via des scripts d'importation SQL, assurant la cohérence entre les utilisateurs (ID) et leurs publications.

### 3. 💬 Interactivité et Modération
- **Système de Commentaires Hybride** : Gestion unifiée des commentaires provenant d'utilisateurs inscrits et d'invités (visiteurs non connectés), avec stockage conditionnel des métadonnées (nom/email).
- **Workflow de Modération** : Implémentation d'un statut pour chaque commentaire (`pending`, `approved`, `spam`), permettant aux administrateurs de valider le contenu avant sa publication visible sur le Front-End.
- **Tableau de Bord Administrateur** : Vue d'ensemble statistique permettant le suivi rapide du volume d'articles et de l'activité des utilisateurs.

---

## 💻 Technologies Clés

| Catégorie | Technologie | Rôle dans le Projet |
| :--- | :--- | :--- |
| **Langage Back-End** | **PHP 8+ (Natif)** | Logique serveur, gestion des sessions, interaction BDD, traitement des formulaires. |
| **Base de Données** | **MySQL 8.0** | Stockage persistant, relations (FK), intégrité des données, requêtes complexes. |
| **Langage Front-End** | **HTML5 / CSS3** | Structure sémantique des pages et mise en forme responsive de l'interface utilisateur. |
| **Serveur Web** | **Apache** | Hébergement local via la suite XAMPP/WAMP/MAMP. |
| **Versioning** | **Git / GitHub** | Gestion du code source, suivi des versions et documentation. |


*Projet réalisé dans le cadre de la formation.*
