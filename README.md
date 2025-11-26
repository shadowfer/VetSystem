# VetSystem - Sistema de Gestión Veterinaria

## Descripción

VetSystem es una aplicación web desarrollada en Laravel para la gestión integral de una clínica veterinaria. El sistema permite la administración de usuarios (clientes y personal), gestión de mascotas, servicios y citas médicas, con un control de acceso basado en roles (Admin, Staff, Cliente).

## Funcionalidades Principales

-   **Autenticación y Seguridad:** Login, Registro y protección de rutas mediante Roles.
-   **Gestión de Usuarios:**
    -   Administradores pueden gestionar Clientes y Personal (Staff).
    -   Funcionalidad de eliminación de usuarios.
-   **Módulo de Mascotas (Dominio):**
    -   Registro de mascotas por parte de clientes (estado pendiente).
    -   Aprobación/Rechazo de mascotas por parte de administradores.
    -   CRUD completo de mascotas con imágenes.
-   **Gestión de Servicios:** Catálogo de servicios veterinarios.
-   **Dashboard Interactivo:** Vistas personalizadas según el rol del usuario.

## Requisitos Previos

-   PHP 8.1 o superior
-   Composer
-   Node.js y NPM
-   MySQL

## Instalación y Configuración

1. **Clonar el repositorio**

    ```bash
    git clone <URL_DEL_REPOSITORIO>
    cd VetSystem
    ```

2. **Instalar dependencias de PHP**

    ```bash
    composer install
    ```

3. **Instalar dependencias de Frontend**

    ```bash
    npm install
    ```

4. **Configurar entorno**

    - Copiar el archivo de entorno de ejemplo:
        ```bash
        cp .env.example .env
        ```
    - Configurar las credenciales de base de datos en el archivo `.env`.

5. **Generar clave de aplicación**

    ```bash
    php artisan key:generate
    ```

6. **Ejecutar migraciones y seeders**
   Este comando creará las tablas e insertará los usuarios de prueba.

    ```bash
    php artisan migrate --seed
    ```

7. **Ejecutar el servidor de desarrollo**
   En una terminal:
    ```bash
    php artisan serve
    ```
    En otra terminal (para compilar assets):
    ```bash
    npm run dev
    ```

## Usuarios de Prueba (Seeders)

| Rol         | Email             | Contraseña |
| ----------- | ----------------- | ---------- |
| **Admin**   | `admin@test.com`  | `password` |
| **Staff**   | `staff@test.com`  | `password` |
| **Cliente** | `client@test.com` | `password` |

## Estructura del Proyecto

-   **Controladores:** `app/Http/Controllers` (UserController, StaffController, PetController, ServiceController)
-   **Modelos:** `app/Models` (User, Pet, Service)
-   **Vistas:** `resources/views` (Organizadas por módulo: admin, pets, services, layouts)
-   **Rutas:** `routes/web.php` (Grupos de rutas protegidos por middleware de roles)

## Autor

[Tu Nombre]
