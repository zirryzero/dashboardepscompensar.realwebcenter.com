# Dashboard Analítica de Datos - EPS Compensar

<p align="center">
  <b>Web portal for medical and administrative data analytics, reporting, and management.</b>
  <br />
  <sub>Built with CodeIgniter 4, CodeIgniter Shield, and PhpSpreadsheet.</sub>
</p>

<p align="center">
  <a href="#english">English</a> •
  <a href="#español">Español</a>
</p>

---

<a name="english"></a>
## 🇬🇧 English

### Overview
Web-based platform designed for processing, managing, and visualizing healthcare and operational analytics for EPS Compensar. It provides role-based access control, user management, interactive report viewing, and batch Excel file ingestion (`.xlsx`) to update key operational datasets.

### ✨ Features
- **Authentication & Access Control**: Powered by [CodeIgniter Shield](https://github.com/codeigniter4/shield) supporting role-based permissions (Administrators and Standard Users).
- **User Administration**: Administrative dashboard to create, update, activate, and delete user accounts.
- **Bulk Data Ingestion**: Module to process and import standardized Excel workbooks into MySQL:
  - Future medical appointments (`citas futuras`)
  - Monthly hiring data (`contratacion mensual`)
  - Case management (`gestion`)
  - Service offerings (`oferta`)
- **Analytics & Dashboards**: Interactive metrics views and operational dashboards.

### 🛠️ System Requirements
- **PHP**: `>= 7.4` or `^8.0` (PHP 8.1 / 8.2 recommended)
  - Required extensions: `intl`, `mbstring`, `json`, `mysqlnd`, `curl`, `gd`, `zip` (required by PhpSpreadsheet).
- **Package Manager**: [Composer](https://getcomposer.org/)
- **Database**: MySQL `>= 5.7` or MariaDB `>= 10.3`
- **Web Server**: Apache / Nginx or CodeIgniter Spark CLI built-in server.

### 🚀 Getting Started

#### 1. Clone the repository
```bash
git clone https://github.com/zirryzero/dashboardepscompensar.realwebcenter.com.git
cd dashboardepscompensar.realwebcenter.com
```

#### 2. Install dependencies
```bash
composer install
```

#### 3. Configure environment variables
Copy the sample environment file to create your local `.env`:

```bash
# Windows (PowerShell)
Copy-Item .env.example .env

# Linux / macOS / Git Bash
cp .env.example .env
```

Open `.env` in your editor and configure your local settings:
```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

# Local MySQL credentials
database.default.hostname = localhost
database.default.database = epscompensar
database.default.username = root
database.default.password = your_local_password
database.default.DBDriver = MySQLi
database.default.port = 3306
```

#### 4. Import the database schema
Create your MySQL database and import the clean structure provided in `schema.sql`:

```bash
# Create database via MySQL CLI
mysql -u root -p -e "CREATE DATABASE epscompensar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Import schema
mysql -u root -p epscompensar < schema.sql
```

*(You may also import `schema.sql` using phpMyAdmin, DBeaver, or MySQL Workbench).*

#### 5. Launch local server
Run the development server using CodeIgniter Spark:

```bash
php spark serve
```

Access the application in your browser at `http://localhost:8080`.

### 📂 Directory Structure

```text
├── app/
│   ├── Config/          # Configuration files (Routes, Database, Shield Auth)
│   ├── Controllers/     # Controllers (AdminController, Controll_cml, Home)
│   ├── Models/          # Database models
│   └── Views/           # UI Views (Admin, CML, Layouts, Errors)
├── assets/              # Static assets (images, logos)
├── css/                 # Custom stylesheet files
├── js/                  # JavaScript logic (DataTables, client interactivity)
├── writable/            # Cache, logs, and session storage (ignored by Git)
├── .env.example         # Safe environment template
├── schema.sql           # Anonymized database structure (DDL only)
├── composer.json        # PHP dependencies manifest
└── spark                # CodeIgniter 4 CLI tool
```

### 🔒 Security & Privacy
- **Environment Confidentiality**: `.env` is ignored by Git and must never be committed to version control.
- **Anonymized Schema**: `schema.sql` contains exclusively table definitions (DDL). No private patient records, user identities, or sensitive data are included.
- **Ignored Storage**: Generated sessions, debugbar output, and logs in `writable/` are excluded to prevent data leaks.

---

<a name="español"></a>
## 🇪🇸 Español

### Descripción General
Sistema web para la gestión, procesamiento y visualización de analítica de datos médicos y administrativos de EPS Compensar, desarrollado con **CodeIgniter 4**, **CodeIgniter Shield** (autenticación y roles) y **PhpSpreadsheet** (importación masiva de datos Excel).

### ✨ Características
- **Autenticación y Control de Accesos**: Implementado mediante [CodeIgniter Shield](https://github.com/codeigniter4/shield) con soporte para roles y permisos (Administradores y Usuarios).
- **Gestión de Usuarios**: Creación, edición, activación y eliminación de usuarios desde el panel de administración.
- **Carga y Procesamiento de Datos**: Módulo para la subida e importación de reportes operativos en formato Excel (`.xlsx`):
  - Citas futuras (`citas futuras`)
  - Contratación mensual (`contratacion mensual`)
  - Gestión (`gestion`)
  - Oferta (`oferta`)
- **Visualización de Reportes**: Vistas interactivas para análisis de métricas y cuadros de mando.

### 🛠️ Requisitos del Sistema
- **PHP**: `>= 7.4` o `^8.0` (recomendado PHP 8.1 / 8.2)
  - Extensiones requeridas: `intl`, `mbstring`, `json`, `mysqlnd`, `curl`, `gd`, `zip` (necesaria para PhpSpreadsheet).
- **Gestor de Paquetes**: [Composer](https://getcomposer.org/)
- **Base de Datos**: MySQL `>= 5.7` o MariaDB `>= 10.3`
- **Servidor Web**: Apache / Nginx o el servidor integrado de CodeIgniter Spark.

### 🚀 Instalación y Configuración

#### 1. Clonar el repositorio
```bash
git clone https://github.com/zirryzero/dashboardepscompensar.realwebcenter.com.git
cd dashboardepscompensar.realwebcenter.com
```

#### 2. Instalar dependencias con Composer
```bash
composer install
```

#### 3. Configurar variables de entorno
Copia la plantilla de configuración `.env.example` para generar tu archivo `.env`:

```bash
# En Windows (PowerShell)
Copy-Item .env.example .env

# En Linux / macOS / Git Bash
cp .env.example .env
```

Abre `.env` en tu editor y ajusta los valores locales:
```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

# Credenciales de base de datos local
database.default.hostname = localhost
database.default.database = epscompensar
database.default.username = root
database.default.password = tu_password_local
database.default.DBDriver = MySQLi
database.default.port = 3306
```

#### 4. Importar la estructura de la Base de Datos
Crea la base de datos en tu servidor MySQL y luego importa el archivo `schema.sql`:

```bash
# Creación en MySQL
mysql -u root -p -e "CREATE DATABASE epscompensar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Importar el esquema
mysql -u root -p epscompensar < schema.sql
```

*(O puedes importar `schema.sql` directamente desde phpMyAdmin o DBeaver).*

#### 5. Iniciar el servidor local
Ejecuta el servidor de desarrollo integrado de CodeIgniter:

```bash
php spark serve
```

La aplicación estará disponible en `http://localhost:8080`.

### 📂 Estructura del Proyecto

```text
├── app/
│   ├── Config/          # Archivos de configuración (Rutas, Base de Datos, Auth Shield)
│   ├── Controllers/     # Controladores (AdminController, Controll_cml, Home)
│   ├── Models/          # Modelos de acceso a datos
│   └── Views/           # Vistas (Admin, CML, Layouts, Errores)
├── assets/              # Recursos estáticos (imágenes, logos)
├── css/                 # Hojas de estilo personalizadas
├── js/                  # Scripts JavaScript (DataTables, interactividad)
├── writable/            # Directorio de logs, sesiones y caché (ignorado por Git)
├── .env.example         # Plantilla de variables de entorno para despliegue
├── schema.sql           # Estructura DDL limpia de la base de datos
├── composer.json        # Dependencias de PHP
└── spark                # CLI de CodeIgniter 4
```

### 🔒 Seguridad y Privacidad
- **Variables de Entorno**: El archivo `.env` está en `.gitignore` y nunca debe subirse al control de versiones.
- **Datos Sensibles**: El archivo `schema.sql` contiene exclusivamente la definición estructural de tablas (DDL). No incluye registros personales ni datos clínicos de pacientes/usuarios.
- **Directorio Writable**: Las sesiones activas, logs de depuración y archivos en caché están excluidos del repositorio para evitar fugas de información.

---

## 📄 License / Licencia

This project is licensed under the [MIT License](LICENSE).
