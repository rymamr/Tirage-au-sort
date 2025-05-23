
# 🎯 Application de Tirage au Sort

Bienvenue dans ce projet Laravel dédié au tirage au sort !  
Cette application vous permet d’effectuer des sélections aléatoires en toute simplicité via une interface web.

---

## 🧰 Technologies utilisées

- **Laravel** (v11)
- **PHP** (>= 8.1)
- **MySQL** 
- **Node.js & npm**

---

## 📦 Installation pas à pas

### 1. Cloner le dépôt

```bash
git clone https://github.com/ton-utilisateur/nom-du-repo.git
cd nom-du-repo
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Préparer le fichier d’environnement

```bash
cp .env.example .env
```

Ensuite, ouvre le fichier `.env` pour y configurer ta base de données :

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_base
DB_USERNAME=utilisateur
DB_PASSWORD=mot_de_passe
```

### 4. Générer la clé de l’application

```bash
php artisan key:generate
```

### 5. Appliquer les migrations (si nécessaires)

```bash
php artisan migrate
```

---

## 🎨 Compilation des assets (Vite)

### Étapes à suivre pour éviter l’erreur `ViteManifestNotFoundException` :

```bash
npm install
npm run dev
```

> Le fichier `public/build/manifest.json` sera généré automatiquement. Il est requis pour que Laravel charge correctement les fichiers CSS et JS.

---

## ▶️ Lancer le serveur local

```bash
php artisan serve
```

Accède à l’application via :  
🔗 http://127.0.0.1:8000

---

## 🛠 En production

Si tu prépares un déploiement :

```bash
npm run build
php artisan config:cache
```

---

## ❓ Besoin d’aide ?

- Vérifie la [documentation Laravel](https://laravel.com/docs).
- Consulte les logs (`storage/logs`) si une erreur survient.
- Assure-toi que le fichier `.env` est bien configuré.

---

## ✅ Tout est prêt !

Tu peux maintenant utiliser l’application ! 🎉  
Merci d’avoir installé ce projet !


---

## 🗃 Script SQL

Le script de création de la base de données est disponible ici :  
🔗 [tirage_au_sort.sql](https://github.com/rymamr/Tirage-au-sort/blob/main/tirage_au_sort.sql)

Vous pouvez l’importer directement dans votre outil de gestion de base de données
