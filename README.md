# Gestor ADSO

Proyecto integrador con **PHP y Laravel** para el programa ADSO (SENA Regional Antioquia · CTMA), desarrollado con Aprendizaje Basado en Proyectos (ABP). Este README documenta la **Semana 1: instalación y primer arranque**.

- **Autor:** Carlos Gonzalez
- **Ficha:** 3412768
- **Instructor:** Gustavo Bolaños
- **Sistema operativo:** Ubuntu (GNU/Linux)

---

## 1. Herramientas y versiones reales

> Versiones obtenidas ejecutando cada comando en mi equipo.

| Herramienta | Comando | Versión registrada |
|---|---|---|
| PHP | `php -v` | 8.2.12 
| Composer | `composer -V` | 2.10.3
| Laravel | `php artisan --version` | 12.69.3
| MariaDB | `mariadb --version` | 10.4.32
| Git | `git --version` | 2.53.0
| VS Code | `code --version` | 1.141.0

Ruta de PHP (`which php`): 

---

## 2. Instalación del entorno

En Konsole:

```bash
sudo apt update
sudo apt install -y php-cli php-mbstring php-xml php-curl php-zip php-mysql mariadb-server composer git unzip
```

1. **PHP:** verificar con `which php` y `php -v`.
2. **Extensiones:** Laravel necesita `openssl`, `PDO`, `pdo_mysql`, `mbstring`, `fileinfo` y `zip`. No se edita `php.ini` a mano; con `php --ini` se ve qué archivos carga PHP y con `php -m` se confirma que las extensiones estén cargadas.
3. **MariaDB:** iniciar el servicio y verificar que corre.

   ```bash
   sudo systemctl enable --now mariadb
   systemctl status mariadb
   ```

4. **Composer:** verificar con `composer -V`.
5. **Git:** verificar con `git --version` y configurar la identidad:

   ```bash
   git config --global user.name "<TU NOMBRE>"
   git config --global user.email "<TU CORREO>"
   ```

6. **VS Code:** instalar desde <https://code.visualstudio.com> (paquete `.deb`) o con `sudo snap install code --classic`. Verificar con `code --version`.

---

## 3. Proyecto Laravel y `.env`

```bash
mkdir -p ~/proyectos && cd ~/proyectos
composer create-project laravel/laravel gestor-adso
cd gestor-adso
php artisan --version
cp .env.example .env
php artisan key:generate
```

Configuración de base de datos en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestor_adso
DB_USERNAME=adso
DB_PASSWORD=
```

---

## 4. Base de datos y migraciones

Crear la base de datos y el usuario (la contraseña debe coincidir con `DB_PASSWORD`):

```bash
sudo mariadb -e "CREATE DATABASE gestor_adso CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'adso'@'localhost' IDENTIFIED BY '<CONTRASEÑA>';
GRANT ALL PRIVILEGES ON gestor_adso.* TO 'adso'@'localhost';
FLUSH PRIVILEGES;"
```

Luego, dentro del proyecto:

```bash
php artisan config:clear
php artisan migrate
```

---

## 5. Ejecutar el servidor

```bash
php artisan serve
```

Abrir la dirección que muestre la terminal (normalmente <http://127.0.0.1:8000>); debe verse la pantalla de bienvenida de Laravel.

---

## 6. Control de versiones

```bash
git init
git add .
git commit -m "Semana 1: Entorno listo + Laravel base"
```

---

## 7. Evidencias del proceso

| # | Qué se hizo | Comando / acción | Resultado obtenido |
|---|---|---|---|
| 1 | Instalar PHP, MariaDB, Composer y Git con apt | `sudo apt install ...` | <DESCRIBIR> |
| 2 | Verificar PHP y extensiones | `which php` · `php -v` · `php -m` | <RUTA, VERSIÓN Y EXTENSIONES REALES> |
| 3 | Iniciar MariaDB | `sudo systemctl enable --now mariadb` | <DESCRIBIR> |
| 4 | Verificar Composer, Git y VS Code | `composer -V` · `git --version` · `code --version` | <VERSIONES REALES> |
| 5 | Crear el proyecto Laravel | `composer create-project laravel/laravel gestor-adso` | <VERSIÓN REAL DE LARAVEL> |
| 6 | Configurar `.env` y crear BD y usuario | `php artisan key:generate` · `sudo mariadb -e "CREATE DATABASE ..."` | <DESCRIBIR> |
| 7 | Ejecutar migraciones | `php artisan migrate` | <DESCRIBIR> |
| 8 | Levantar el servidor | `php artisan serve` | <DIRECCIÓN REAL Y QUÉ SE VIO> |
| 9 | Primer commit | `git add .` · `git commit` | <DESCRIBIR> |

El proceso es reproducible: cualquier persona con Kubuntu puede seguir estos pasos con el mismo resultado, verificando cada herramienta antes de avanzar.
