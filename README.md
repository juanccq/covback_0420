Covback_0420
==========

## Features
## Instalación
Seguir los pasos para la instalación

    cd covback_0420
    composer install                   # Install backend dependencies
    yarn                               # Install node packages
    sudo chmod 777 -R storage          # Chmod Storage
    cp .env.example .env               # Update database credentials configuration
    php artisan key:generate           # Generate new keys for Laravel
    php artisan migrate:refresh --seed # Run migration and seed users and categories for testing

## Pruebas

## Versiones
- php : 7.2 (desarrollo) 7.2 (produccion)
- laravel : 6
- mysql