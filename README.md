## Guia de Instalación:
### Requisitos Previos:
Asegúrate de tener instalado PHP, Composer, Node.js y Git. Puedes ejecutar los siguientes comandos en tu terminal:

* Para verificar la versión de PHP:
``` bash
php --version
```
* Para verificar la versión de Composer:
``` bash
composer --version
```
* Para verificar la versión de Node.js:
``` bash
node --version
```
* Para verificar la versión de Git:
``` bash
git --version
```
Si no tienes instalado alguno de estos requisitos, puedes descargarlos e instalarlos desde los siguientes enlaces:
* [Descargar PHP](https://www.php.net/downloads)
* [Descargar Composer](https://getcomposer.org/download/)
* [Descargar Node.js](https://nodejs.org/en/download)
* [Descargar Git](https://git-scm.com/downloads)

### Instalación del Proyecto

1. Clona este repositorio. Abre tu terminal en la carpeta deseada y ejecuta el siguiente comando:
``` bash
git clone https://github.com/CalderonExe22/users-roles.git
```
2. Accede al directorio del proyecto ejecutando el siguiente comando:
``` bash
cd users-roles
```
3. Instala las dependencias Composer del proyecto ejecutando el siguiente comando:
``` bash
composer install
```
4. Instala las dependencias Node del proyecto ejecutando el siguiente comando:
``` bash
npm install
```
5. Copia el archivo ".env.example" a un nuevo archivo llamado ".env" ejecutando el siguiente comando:
``` bash
cp .env.example .env
```
6. Genera una clave de aplicación para Laravel ejecutando el siguiente comando:
``` bash
php artisan key:generate
```
7. Abre el archivo ".env" en tu editor de texto favorito y configura los detalles de tu base de datos. Aquí tienes un ejemplo:
``` bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=remplazar_nombre_de_tu_base_de_datos
DB_USERNAME=remplazar_con_tu_usuario
DB_PASSWORD=remplazar_con_tu_contraseña
```
8. Migra las tablas de la base de datos y seeders ejecutando el siguiente comando:
``` bash
php artisan migrate --seed
``` 
9. Puede poblar la base de datos con el Usuario "admin@example.com" con contraseña "password". 

10. Compila los assets del front-end (JavaScript y CSS) ejecutando el siguiente comando:
``` bash
npm run dev
```
11. Finalmente iniciar el servidor de desarrollo local de Laravel ejecutando el siguiente comando:
``` bash
php artisan serve
```