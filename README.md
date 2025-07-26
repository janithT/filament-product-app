# Laravel + Filament Admin Panel

This is a Laravel project using [Filament Admin](https://filamentphp.com) for backend administration and CRUD interfaces.

---

## 🛠 Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM (for frontend assets, optional)
- SQLite / MySQL / PostgreSQL
- Laravel CLI (`composer global require laravel/installer`)
- Laravel Filament installed

---

## 🚀 Installation Steps

1. **Clone the repository:**
   ```bash
   git clone [repository url above]
   cd project_folder

2. **Install dependencies:**

    ```bash
    composer install

3. **Copy the env:**
    ```bash
    cp .env.example .env

    And add the database url for sqllite.

4. **generagte key, then run migations with seeds:**
    ```bash
    php artisan key:generate
    php artisan migrate --seed

    Only colors seed is there.

5. **Build frontend assets::**

    ```bash
    npm install && npm run dev


For user credentials, please see databaseSeeder for more information. 