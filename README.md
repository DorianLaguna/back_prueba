# Laravel Project

Este proyecto es una prueba técnica en Laravel. Sigue los pasos a continuación para instalar y ejecutar el proyecto en tu entorno local.

## Requisitos Previos

Asegúrate de tener instalados los siguientes requisitos en tu sistema:

- **PHP**: Versión 8.2 o superior.
- **Composer**: Para gestionar las dependencias de PHP.
- **Node.js y npm**: Para gestionar las dependencias de frontend.
- **MySQL**: Para la base de datos.

## Instalación

1. Clona este repositorio en tu máquina local:
   ```bash
   git clone https://github.com/DorianLaguna/back_prueba
   cd back_prueba
   ```

2. Instala las dependencias de PHP usando Composer:
   ```bash
   composer install
   ```

3. Instala las dependencias de Node.js:
   ```bash
   npm install
   ```

4. Crea un archivo `.env` basado en el archivo de ejemplo:
   ```bash
   cp .env.example .env
   ```

5. Configura la base de datos en el archivo `.env` con las credenciales de tu servidor MySQL:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_de_tu_base_de_datos
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```

6. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

7. Ejecuta las migraciones para configurar la base de datos:
   ```bash
   php artisan migrate
   ```

## Ejecución del Proyecto

1. Inicia el servidor de desarrollo:
   ```bash
   npm run dev
   ```

2. En otra terminal, ejecuta el siguiente comando para iniciar el servidor Laravel:
   ```bash
   php artisan serve
   ```

3. Accede a la aplicación en tu navegador en la siguiente URL:
   [http://localhost:5174/register](http://localhost:5174/register).

   Asegúrate de que tanto el backend como el frontend estén corriendo antes de acceder a la URL.

## Configuración de la Base de Datos para Pruebas

Para ejecutar las pruebas, asegúrate de configurar una base de datos separada para el entorno de pruebas. En el archivo `.env.testing`, agrega o ajusta las siguientes variables:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos_testing
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```


Luego, edita el archivo `.env.testing` para incluir las credenciales de la base de datos de pruebas.

## Pruebas

Para ejecutar las pruebas, usa el siguiente comando:
```bash
php artisan test --env=testing
```
