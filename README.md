## Instalación

1. crear el archivo file .env
   Ejecute el siguiente comando

```
cp .env.example .env
```

2. Instalar dependencias. Ejecute el siguiente comando

```
composer install
```

3. Crear Base de Dato llamada

```
bd_name
```

configurar los valores de la base de datos en el archivo .env
ejemplo:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bd_name
DB_USERNAME=root
DB_PASSWORD=
```

4. generate key
   Ejecute el comando:

```
php artisan key:generate
```

4. instalar dependencias:

```
npm run dev
```

6. Migraciones y Seeders
   Ejecute el comando

```
php artisan migrate:fresh --seed
```

7. para el entorno de produccion

```
npm run build
```