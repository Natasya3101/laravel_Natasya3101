# laravel_Natasya3101
Example Laravel scaffold demonstrating:
- Login using `username` (not email)
- CRUD Rumah Sakit (Hospitals)
- CRUD Data Pasien (Patients) with relation to Rumah Sakit
- AJAX delete for records
- AJAX dropdown filter for patients by hospital
- Migrations and seeders included

Instructions:
1. Copy files into a new Laravel project's `app/`, `database/`, `routes/`, `resources/views/` and `public/js/` respectively.
2. Run `composer install` and set up `.env`.
3. Run `php artisan migrate --seed`.
4. Serve with `php artisan serve`.
