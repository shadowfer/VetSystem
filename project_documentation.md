# Documentación del Proyecto VetSystem

Este documento proporciona una visión general y detallada del código fuente del proyecto **VetSystem**. El sistema es una aplicación web desarrollada en **Laravel** (framework de PHP) diseñada para la gestión de una clínica veterinaria.

## 1. Estructura de Carpetas Principal

A continuación se describe el propósito de las carpetas más importantes en la raíz del proyecto:

-   **`app/`**: Contiene el núcleo de la lógica de la aplicación. Aquí residen los Modelos, Controladores y Middleware.
-   **`bootstrap/`**: Archivos de arranque del framework.
-   **`config/`**: Todos los archivos de configuración del sistema (base de datos, correo, servicios, etc.).
-   **`database/`**: Contiene las migraciones (estructura de la base de datos) y seeders (datos de prueba).
-   **`public/`**: El directorio raíz accesible desde la web. Contiene `index.php` (punto de entrada) y activos como imágenes, CSS y JS compilados.
-   **`resources/`**: Contiene los archivos "crudos" que no se han compilado:
    -   `views/`: Plantillas HTML (Blade).
    -   `css/` y `js/`: Estilos y scripts fuente.
-   **`routes/`**: Definición de las URLs de la aplicación (`web.php` para navegador, `api.php` para APIs).
-   **`storage/`**: Archivos generados por Laravel (logs, cachés, archivos subidos por usuarios).
-   **`tests/`**: Pruebas automatizadas.
-   **`vendor/`**: Librerías de terceros instaladas vía Composer.

---

## 2. Lógica de la Aplicación (`app/`)

Esta carpeta contiene la lógica de negocio.

### 2.1. Modelos (`app/Models/`)

Los modelos representan las tablas de la base de datos y sus relaciones.

-   **`User.php`**: Representa a los usuarios del sistema (Administradores, Staff, Clientes). Maneja la autenticación.
-   **`Pet.php`**: Representa a las mascotas. Probablemente tiene relación con `User` (dueño).
-   **`Service.php`**: Representa los servicios veterinarios ofrecidos (ej. Consulta, Vacunación).

### 2.2. Controladores (`app/Http/Controllers/`)

Los controladores manejan las peticiones del usuario y deciden qué hacer.

-   **`UserController.php`**: Lógica para gestionar usuarios (probablemente para administradores).
-   **`StaffController.php`**: Lógica específica para gestionar al personal de la clínica.
-   **`PetController.php`**:
    -   Permite a los clientes registrar y ver sus mascotas.
    -   Permite al Staff/Admin aprobar o rechazar mascotas (`approve`, `reject`).
-   **`ServiceController.php`**: Gestión del catálogo de servicios.
-   **`ProfileController.php`**: Permite a cualquier usuario logueado editar su propio perfil.
-   **`Auth/`**: Controladores predeterminados de Laravel para Login, Registro y recuperación de contraseña.

---

## 3. Rutas (`routes/web.php`)

El archivo `routes/web.php` define cómo se accede a la aplicación.

-   **Públicas**:
    -   `/`: Página de bienvenida (`welcome.blade.php`).
-   **Autenticadas (General)**:
    -   `/dashboard`: Panel principal.
    -   `/profile`: Gestión de perfil.
    -   `/pets`: Gestión de mascotas (CRUD básico).
    -   `/services`: Ver servicios (solo lectura para clientes).
-   **Administradores (`admin.*`)**:
    -   `/admin/users`: Gestión completa de usuarios.
    -   `/admin/staff`: Gestión de personal.
-   **Staff y Admin**:
    -   `/services`: Gestión completa de servicios (Crear, Editar, Eliminar).
    -   `/pets/{pet}/approve`: Aprobar mascota.
    -   `/pets/{pet}/reject`: Rechazar mascota.

---

## 4. Base de Datos (`database/migrations/`)

Las migraciones definen la estructura de las tablas.

-   **`users`**: Tabla de usuarios (nombre, email, password, rol).
-   **`pets`**:
    -   Campos básicos de la mascota.
    -   `add_status_and_image_to_pets_table`: Añade campos para el estado (pendiente/aprobado) y foto de la mascota.
-   **`services`**: Tabla para el catálogo de servicios.

---

## 5. Vistas (`resources/views/`)

Aquí está la interfaz gráfica (HTML + Blade).

-   **`layouts/`**: Plantillas base (ej. `app.blade.php`) que incluyen la navegación y el pie de página común.
-   **`welcome.blade.php`**: La "Landing Page" o página de inicio pública.
-   **`dashboard.blade.php`**: El panel de control principal una vez logueado.
-   **`pets/`**: Vistas para listar, crear y editar mascotas.
-   **`services/`**: Vistas para el catálogo de servicios.
-   **`admin/`**: Vistas exclusivas para administración de usuarios y roles.
-   **`auth/`**: Formularios de login y registro.

---

## Resumen del Flujo de Trabajo

1.  Un **Usuario** se registra y entra al sistema.
2.  Puede registrar una **Mascota** en `/pets`.
3.  La mascota queda en estado "Pendiente" (según la lógica de `PetController`).
4.  Un **Staff** o **Admin** revisa la mascota y la aprueba o rechaza.
5.  El **Admin** puede gestionar quién es Staff y quién es usuario normal en `/admin/users`.
6.  El **Staff** puede actualizar el catálogo de servicios en `/services`.
