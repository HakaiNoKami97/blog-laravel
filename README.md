# 📌 Blog con Laravel, Livewire y TailwindCSS  

Este proyecto es una aplicación web desarrollada en **Laravel** con **Livewire**, que permite gestionar usuarios, publicaciones y suscripciones en un blog en tiempo real.  

## 🚀 Stack Tecnológico  

- **Laravel** 🏗️ - Framework backend en PHP.  
- **Livewire** ⚡ - Para manejar interactividad sin necesidad de JavaScript.  
- **TailwindCSS** 🎨 - Para diseñar la interfaz con estilos modernos y responsivos.  
- **Alpine.js** 🏔️ - Para funcionalidades dinámicas en el frontend.  
- **MySQL** 🗄️ - Base de datos para almacenamiento.  
- **Laragon** 🛠️ - Entorno de desarrollo recomendado para Windows (opcional).  

---

## 🛠️ Instalación y Configuración  

### 1️⃣ **Clonar el repositorio**  
Abre la terminal y ejecuta:  

```bash
git clone https://github.com/HakaiNoKami97/blog-laravel
cd blog-laravel

### 2️⃣ **Instalar Dependencias**  
Ejecuta los siguientes comandos: 
composer install
npm install

### 3️⃣ **Configurar el entorno**
Copia el archivo de configuración de entorno:
cp .env.example .env

Genera la clave de la aplicación:
php artisan key:generate

### 4️⃣ **Configurar la base de datos**
Edita el archivo .env y actualiza estas variables con tus credenciales de MySQL:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=root
DB_PASSWORD=

Luego, ejecuta las migraciones y semillas:
php artisan migrate --seed

### 5️⃣ **Iniciar el servidor**
Para ejecutar la aplicación en modo local:
php artisan serve

Abre en tu navegador:
🔗 http://127.0.0.1:8000

### 6️⃣ **Compilar los assets (CSS/JS)**
Si usas TailwindCSS y Vite, ejecuta:
npm run dev

Para producción:
npm run build

### 🧪 Pruebas
Para ejecutar las pruebas unitarias:
php artisan test


### 📌 Características
✅ Registro de usuarios con verificación de edad.
✅ Gestión de publicaciones con suscripciones en tiempo real.
✅ Administración de usuarios activos/inactivos.
✅ Integración con APIs externas.
✅ Interfaz responsiva con TailwindCSS.