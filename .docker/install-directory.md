# Guide d'Installation pour l'Application Docker

Ce guide décrit toutes les étapes à suivre pour configurer correctement l'environnement de votre application dans un conteneur Docker.  
Les opérations suivantes sont à réaliser **à l'intérieur** du conteneur Docker.

---

## 1. Se connecter au conteneur Docker

Avant de lancer les commandes d'installation, connectez-vous au conteneur où est déployée l'application.  
Remplacez `<serviceId>` par l'identifiant ou le nom de votre service Docker :

```bash
docker exec -it <serviceId> /bin/sh
```

> **Note :**  
> La commande ci-dessus ouvre un shell interactif à l'intérieur du conteneur.

---

## 2. Se positionner dans le répertoire de l’application

Une fois connecté, déplacez-vous dans le répertoire de l’application.  
Dans notre exemple, le répertoire de l’application est `/var/www/html` :

```bash
cd /var/www/html
```

---

## 3. Création des répertoires nécessaires

Créez les dossiers requis pour le stockage des logs, des sessions, des vues, du cache, et pour la base de données SQLite.  
La commande suivante crée plusieurs dossiers en une seule ligne :

```bash
mkdir -p storage/logs \
         storage/framework/{sessions,views,cache} \
         storage/database \
         bootstrap/cache
```

> **Explication :**
> - `storage/logs` : Répertoire pour les logs de l'application.
> - `storage/framework/sessions` : Pour les sessions PHP.
> - `storage/framework/views` : Pour le cache des vues compilées.
> - `storage/framework/cache` : Pour d'autres caches de l'application.
> - `storage/database` : Pour stocker le fichier SQLite (si utilisé).
> - `bootstrap/cache` : Pour le cache de bootstrap.

---

## 4. Création du fichier SQLite (si la base de données est en SQLite)

Si votre application utilise SQLite, créez un fichier vide qui servira de base de données.

1. **Accéder au dossier dédié à la base de données :**

   ```bash
   cd storage/database
   ```

2. **Créer le fichier `database.sqlite` :**

   ```bash
   touch database.sqlite
   ```

3. **Retourner à la racine de l’application :**

   ```bash
   cd ../..
   ```

> **Configuration dans `config/database.php` :**  
> Assurez-vous que la section pour SQLite est configurée comme suit :
>
> ```php
> 'sqlite' => [
>     'driver' => 'sqlite',
>     'database' => storage_path('database/database.sqlite'),
>     'prefix' => '',
>     'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
> ],
> ```

---

## 5. Ajustement des permissions

Il est important de donner la propriété des répertoires critiques à l’utilisateur du serveur web (`www-data`) et d’ajuster les droits d’accès.

Exécutez les commandes suivantes :

```bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

> **Explication :**
> - `chown -R www-data:www-data` : Change récursivement le propriétaire et le groupe en `www-data`.
> - `chmod -R 775` : Donne les droits en lecture, écriture et exécution au propriétaire et au groupe, et la lecture et l'exécution aux autres.

---

## 6. Exécuter les migrations de la base de données

Pour mettre à jour la base de données avec les dernières migrations de Laravel, lancez :

```bash
php artisan migrate
```

> **Remarque :**  
> Cette commande va appliquer toutes les migrations définies dans votre application pour mettre en place la structure de la base de données.

---

## Résumé de la procédure

1. **Connexion au conteneur** :  
   `docker exec -it <serviceId> /bin/sh`
2. **Navigation dans le répertoire de l’application** :  
   `cd /var/www/html`
3. **Création des répertoires** :  
   `mkdir -p storage/logs storage/framework/{sessions,views,cache} storage/database bootstrap/cache`
4. **Création du fichier SQLite (si nécessaire)** :
   ```bash
   cd storage/database
   touch database.sqlite
   cd ../..
   ```
5. **Ajustement des permissions** :
   ```bash
   chown -R www-data:www-data storage bootstrap/cache
   chmod -R 775 storage bootstrap/cache
   ```
6. **Exécution des migrations** :  
   `php artisan migrate`

---

## Conclusion

En suivant ces étapes, vous aurez configuré correctement les répertoires nécessaires, ajusté les permissions et préparé la base de données pour votre application Dockerisée.  
Assurez-vous de bien exécuter ces commandes dans l'ordre indiqué pour éviter toute erreur de permission ou de configuration.

Bonne installation !

