# Dashboard Analítica de Datos - EPS Compensar

Sistema web para la gestión, procesamiento y visualización de analítica de datos médicos y administrativos de EPS Compensar, desarrollado con **CodeIgniter 4**, **CodeIgniter Shield** (autenticación y roles) y **PhpSpreadsheet** (importación masiva de datos Excel).

---

## 🚀 Características

- **Autenticación y Control de Accesos**: Implementado mediante CodeIgniter Shield con soporte para roles y permisos (Administradores y Usuarios).
- **Gestión de Usuarios**: Creación, edición, activación y eliminación de usuarios desde el panel de administración.
- **Carga y Procesamiento de Datos**: Módulo para la subida e importación de reportes operativos en formato Excel (`.xlsx`):
  - Citas futuras
  - Contratación mensual
  - Gestión
  - Oferta
- **Visualización de Reportes**: Vistas interactivas para análisis de métricas y dashboards.

---

## 🛠️ Requisitos del Sistema

- **PHP**: `>= 7.4` o `^8.0` (recomendado PHP 8.1 / 8.2)
  - Extensiones requeridas: `intl`, `mbstring`, `json`, `mysqlnd`, `curl`, `gd`, `zip` (necesaria para PhpSpreadsheet).
- **Gestor de Paquetes**: [Composer](https://getcomposer.org/)
- **Base de Datos**: MySQL `>= 5.7` o MariaDB `>= 10.3`
- **Servidor Web**: Apache / Nginx o el servidor integrado de CodeIgniter Spark.

---

## 📦 Instalación y Configuración

### 1. Clonar el repositorio
```bash
git clone https://github.com/zirryzero/dashboardepscompensar.realwebcenter.com.git
cd dashboardepscompensar.realwebcenter.com
```

### 2. Instalar dependencias con Composer
```bash
composer install
```

### 3. Configurar variables de entorno
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

### 4. Importar la estructura de la Base de Datos
Crea la base de datos en tu servidor MySQL y luego importa el archivo `schema.sql`:

```bash
# Creación en MySQL
mysql -u root -p -e "CREATE DATABASE epscompensar CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Importar el esquema
mysql -u root -p epscompensar < schema.sql
```

*(O puedes importar `schema.sql` directamente desde phpMyAdmin o DBeaver).*

### 5. Iniciar el servidor local
Ejecuta el servidor de desarrollo integrado de CodeIgniter:

```bash
php spark serve
```

La aplicación estará disponible en `http://localhost:8080`.

---

## 📂 Estructura del Proyecto

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

---

## 🔒 Seguridad y Privacidad

- **Variables de Entorno**: El archivo `.env` está en `.gitignore` y nunca debe subirse al control de versiones.
- **Datos Sensibles**: El archivo `schema.sql` contiene exclusivamente la definición estructural de tablas (DDL). No incluye registros personales ni datos clínicos de pacientes/usuarios.
- **Directorio Writable**: Las sesiones activas, logs de depuración y archivos en caché están excluidos del repositorio para evitar fugas de información.

---

## 📄 Licencia

Este proyecto está bajo la licencia [MIT](LICENSE).
