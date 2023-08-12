# NFT Market

NFT Market est une place de marché pour acheter et vendre des NFT.

## Installation

### Prérequis

- PHP >= 8.1.0
- MySQL 
- Composer
- Node.js et npm (pour compiler les actifs)

### Étapes D'installation

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/username/project-name.git
   cd project-name

   
2.### Installer les dépendances
composer install
npm install

3.###Copier le fichier d'exemple d'environnement et faire les modifications de configuration nécessaires dans le fichier .env
cp .env.example .env

4.###Générer une nouvelle clé d'application
php artisan key:generate

5.###Exécuter les migrations de la base de données
php artisan migrate

6.###Créer un lien symbolique pour le stockage
php artisan storage:link

7.###Compiler les actifs
npm run dev

8.###Démarrer le serveur de développement local
php artisan serve
