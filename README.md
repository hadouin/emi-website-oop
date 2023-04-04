# EMI - The APP that cares for your workforce
Repo pour l'APP-G10D

## ⚡️ Getting Started

Clone the project

```bash
git clone https://github.com/hadouin/emi-website-oop.git
```

Navigate to the project directory

```bash
cd emi-website-oop
```

> **On windows:**  
> - download [Docker-Desktop](https://www.docker.com/products/docker-desktop/)  
> - `wsl --install` (in cmd or powershell)

Start the services
```bash
docker-compose up -d
```

## 💻 DEV env

### Server Web (php-apache)
C'est le server de notre site la ou on va mettre tous les fichiers.
Il est éxposé sur le port `80`

> addresse du site `http://localhost`

#### extensions php
ajouté par le dockerfile on a mis `pdo_mysql`

### PHP MyAdmin
Le module php my admin est accessible sur: `http://localhost:8080`.
Pour les logins voir [dotenv variables](#env-variables)

### Maria db
C'est le server de la base de données éxposé sur le port 3306
on utilise mariadb car c'est une version répandue et optimisé pour une base de données SQL

### `.env` variables
Dans le fichier `.env` on défini les variables pour l'environnement
```dotenv
# Database
MYSQL_DATABASE="emi"
MYSQL_USER="admin"
MYSQL_PASSWORD="pass"
MYSQL_ROOT_PASSWORD="pass"
MYSQL_HOST='db'
MYSQL_PORT=3306
```
ici on a seulement la configuration pour la base de donnée qui nous permet de créer les utilisateurs de base pour le server SQL.

**root user:**
- login: root *(fixe)*
- password: pass *(défini par `MYSQL_ROOT_PASSWORD`)*

**database specific user:**
Cet utilisateur a les droits pour la BDD spécifié dans `MYSQL_DATABASE`
- login: admin *(défini par `MYSQL_USER`)*
- password: pass *(défini par `MYSQL_PASSWORD`)*

## 🗺️ Project structure 

<!--
  ok depart
-->

```bash
├── src/
│   ├── assets/
│   ├── controllers/
│   ├── includes/
│   ├── model/
│   │   ├── entities/
│   ├── templates/
│   │   ├── app/
│   │   ├── forum/
│   ├── .htaccess
│   ├── index.php
├── .env
├── .gitignore
├── composer.json
├── docker-compose.yml
├── dockerfile
├── package.json
└── ...
```

### `src/`
The `src/` folder is where most of your project source code lives.
#### `assets/`
Ce qui n'est pas du code php donc on a les images le css et le js
#### `controllers/` 
Les controllers PHP. Chacun est utilisé pour une route `GET` et `POST`. 
- En `GET` on va render la page qu'il faut afficher avec l'initialisades bonnes variables.
- En `POST` on va faire des actions de type CRUD (Create Read Update Delete) pour alterer la base de données
#### `includes` 🚧depreceated🚧
Les includes sont voués à disparaitre utile avant pour la version non MVC
#### `model/` 
La ou vit le modèle de donnée de l'application cad les classes d'objets et les definitions des repositories
##### `entities/`
Dans entities on met ce qui est vraiment la classe d'un objet avec ses fields, getters and setters.  
Par exemple la classe `User`
```php
class User
{
    public string $id;
    public string $username;
    public string $email;
    public Role $role;
}
```

