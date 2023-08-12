# NFT Market

NFT Market est une place de marché pour acheter et vendre des NFT.

## Coordonnées de l'administrateur
```
Email: admin@admin.com
Password: password
```

## Installation

### Prérequis

- PHP >= 8.1.0
- MySQL 
- Composer
- Node.js et npm (pour compiler les actifs)

### Étapes D'installation

1. **Cloner le dépôt**
```
git clone git@github.com:georgesim1/Projet-2-NFT-Market.git
cd Projet-2-NFT-Market
```
   
2. **Installer les dépendances**
 ```
composer install
npm install
 ```

3. **Copier le fichier d'exemple d'environnement et faire les modifications de configuration nécessaires dans le fichier .env**
 ```
cp .env.example .env
 ```
*Vous devez ajouter un mot de passe root au fichier .env, sinon vous ne pourrez pas vous connecter.*
 ```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=YourDatabase
DB_USERNAME=root
DB_PASSWORD=root
 ```

4. **Générer une nouvelle clé d'application**
 ```
php artisan key:generate
 ```

5. **Exécuter les migrations de la base de données**
 ```
php artisan migrate 
 ```
5.1 **Exécuter la commande suivante pour seeder la base de données**
 ```
php artisan migrate --seed
 ```

6. **Créer un lien symbolique pour le stockage**
 ```
php artisan storage:link
 ```

7. **Compiler les actifs**
 ```
npm run dev
 ```

8. **Démarrer le serveur de développement local**
 ```
php artisan serve
 ```

<!-- CONTACT -->
## Contact

Georgiy Simak

Project Link: ([https://github.com/your_username/repo_name](https://github.com/georgesim1/Projet-2-NFT-Market/tree/master))

<p align="right">(<a href="#readme-top">back to top</a>)</p>
