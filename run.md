# 🚀 Guía rápida para ejecutar el proyecto

Este documento explica cómo configurar, levantar y probar el proyecto Laravel con las APIs `/api/items` y `/api/items/{id}`.

---

## 🛠 Requisitos

- PHP >= 8.2
- Composer
- Laravel CLI (opcional)

> ✅ Nota: Las APIs leen los datos desde `database/data/items.json`, no es necesario configurar base de datos.

---

## 📥 Instalación

1. Clonar el repositorio:
   git clone https://github.com/usuario/proyecto.git
   cd proyecto
   ```
2. Instalar dependencias:
   ```bash
   composer install
   ```
3. Levantar el servidor de desarrollo:
   ```bash
   php artisan serve
   ```
   La API estará disponible en `http://localhost:8000`.
4. Posibilidad de ejecutar tests unitarios:
   ```bash
   php artisan test
   ```
