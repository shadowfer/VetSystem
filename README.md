# 🐾 VetSystem - Sistema de Gestión Veterinaria Integral

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.0-38B2AC?style=for-the-badge&logo=tailwind-css)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)

## 📖 Descripción del Proyecto

**VetSystem** es una plataforma web robusta y escalable diseñada para optimizar la administración y operación de clínicas veterinarias. Desarrollada con el framework **Laravel**, esta aplicación facilita la interacción entre la administración, el personal médico y los clientes, centralizando la información de pacientes (mascotas), citas y servicios.

El sistema implementa una arquitectura segura basada en roles, asegurando que cada usuario tenga acceso únicamente a las funcionalidades pertinentes a su perfil.

---

## 🚀 Características Principales

### 🔐 Autenticación y Seguridad

-   **Sistema de Login/Registro:** Implementado con Laravel Breeze.
-   **Control de Acceso Basado en Roles (RBAC):** Middleware personalizado para restringir rutas y vistas.
-   **Protección CSRF:** Seguridad en todos los formularios.

### 👥 Gestión de Usuarios (Admin)

-   **Administración de Clientes:** Registro, edición y eliminación permanente de usuarios clientes.
-   **Gestión de Personal (Staff):** Control total sobre el equipo de trabajo (Veterinarios, Asistentes).
-   **Filtrado Inteligente:** Vistas separadas para Clientes y Staff para una mejor organización.

### 🐶 Módulo de Pacientes (Mascotas)

-   **Registro de Mascotas:** Los clientes pueden registrar sus propias mascotas.
-   **Flujo de Aprobación:** Las mascotas registradas por clientes entran en estado "Pendiente" hasta ser aprobadas por un Administrador.
-   **Expediente Digital:** Información detallada (Nombre, Especie, Edad, Imagen).
-   **Imágenes Automáticas:** Asignación inteligente de imágenes por defecto según la especie si no se sube una foto.

### 🏥 Servicios y Citas

-   **Catálogo de Servicios:** Visualización de tratamientos y servicios ofrecidos.
-   **Gestión de Citas (Próximamente):** Módulo para agendar y controlar visitas médicas.

---

## 🏗️ Arquitectura del Sistema

El proyecto sigue el patrón de diseño **MVC (Modelo-Vista-Controlador)** propio de Laravel.

### Roles y Permisos

| Rol        | Nivel de Acceso | Funcionalidades Clave                                                         |
| :--------- | :-------------- | :---------------------------------------------------------------------------- |
| **Admin**  | Total           | Gestión de usuarios, roles, aprobación de mascotas, configuración global.     |
| **Staff**  | Medio           | Gestión de servicios, visualización de citas, atención a pacientes.           |
| **Client** | Limitado        | Gestión de sus propias mascotas, visualización de servicios, perfil personal. |

### Base de Datos (Tablas Principales)

-   `users`: Almacena credenciales y el campo `role` (admin, staff, client).
-   `pets`: Información de las mascotas. Relación `BelongsTo` con `users`.
-   `services`: Catálogo de servicios veterinarios.

---

## 🛠️ Requisitos Técnicos

Para ejecutar este proyecto localmente, necesitas:

-   **PHP:** >= 8.1
-   **Composer:** Gestor de dependencias de PHP.
-   **Node.js & NPM:** Para compilar los assets (TailwindCSS).
-   **MySQL:** Base de datos relacional.

---

## 💻 Guía de Instalación Paso a Paso

### 1. Clonar el Repositorio

```bash
git clone https://github.com/shadowfer/VetSystem.git
cd VetSystem
```

### 2. Instalar Dependencias Backend

```bash
composer install
```

### 3. Instalar Dependencias Frontend

```bash
npm install
```

### 4. Configuración de Entorno

Duplica el archivo de ejemplo y renómbralo:

```bash
cp .env.example .env
```

Abre el archivo `.env` y configura tu base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vetsystem
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generar Key de Aplicación

```bash
php artisan key:generate
```

### 6. Migraciones y Seeders

Ejecuta las migraciones para crear la estructura de la base de datos y poblarla con datos de prueba:

```bash
php artisan migrate --seed
```

### 7. Ejecutar la Aplicación

Necesitarás dos terminales abiertas:

**Terminal 1 (Servidor Laravel):**

```bash
php artisan serve
```

**Terminal 2 (Compilación de Assets en tiempo real):**

```bash
npm run dev
```

Accede a la aplicación en: `http://127.0.0.1:8000`

---

## 🧪 Usuarios de Prueba (Seeders)

El sistema viene precargado con los siguientes usuarios para facilitar las pruebas:

| Rol               | Email             | Contraseña |
| :---------------- | :---------------- | :--------- |
| **Administrador** | `admin@test.com`  | `password` |
| **Staff**         | `staff@test.com`  | `password` |
| **Cliente**       | `client@test.com` | `password` |

---

## 📂 Estructura de Carpetas Clave

-   `app/Http/Controllers`: Lógica de negocio (UserController, PetController, etc.).
-   `app/Models`: Modelos Eloquent (User, Pet).
-   `database/migrations`: Definiciones de esquema de base de datos.
-   `resources/views`: Plantillas Blade para el frontend.
-   `routes/web.php`: Definición de rutas web y grupos de middleware.

---

## 🤝 Contribución

Las contribuciones son bienvenidas. Por favor, abre un issue primero para discutir lo que te gustaría cambiar.

## 📄 Licencia

Este proyecto es de código abierto y está bajo la licencia [MIT](https://opensource.org/licenses/MIT).
