1- Realizar un ===> composer install <==== en el proyecto, para instalar todas las dependencias.
2- Crear base de datos local con lo dice el .env-example
3- Despues ejecutar por consola el siguiente comando: php artisan migrate:refresh --seed
en el caso que no se corra la migracion ejecutar comando composer dump-autoload
4- ejecutar php artisan serve 