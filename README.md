<p align="center">
  <img src="https://http2.mlstatic.com/frontend-assets/ml-web-navigation/ui-navigation/5.22.8/mercadolibre/logo__large_plus.png" alt="MercadoLibre Logo" width="200"/>
</p>

# Proyecto Hackathon

Este proyecto fue desarrollado como parte de un desafío técnico.  
La solución implementa una **API RESTful** para la gestión de ítems, siguiendo buenas prácticas de desarrollo y una arquitectura simple pero escalable.

---

## 🚀 Tecnologías utilizadas
- **Lenguaje:** PHP 8.2
- **Framework:** Laravel 10
- **Herramientas de soporte:** Composer, GitHub Copilot IA
- **Testing:** Pest PHP
- **Documentación:** Markdown
- **IDE:** PhpStorm

## ⚙️ Instalación y ejecución

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/adrielg/Challenger-BackEnd-Ai.git
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

# API de Productos

Esta API ofrece información de productos a través de dos endpoints principales:

- `GET /api/products`       → Devuelve la lista completa de productos.
- `GET /api/products/{id}`  → Devuelve un producto específico por su `id`.

Los datos se almacenan en un archivo JSON local:  
`/database/data/products.json`.

## Arquitectura

El proyecto se desarrolló sobre **Laravel**, utilizando su arquitectura **MVC por defecto** con algunas adaptaciones para seguir los principios **SOLID**.

Para mantener flexibilidad y seguir principios de **código limpio**, se implementó una arquitectura en capas con:

- **Contratos (Interfaces):** Define la abstracción `ProductRepository` para el acceso a datos.
- **Servicios:** `ProductFileService` implementa la lógica de acceso y manipulación de datos JSON.
- **Casos de Uso:** Clases individuales como `GetProduct` y `GetAllProduct` que encapsulan la lógica de negocio.
- **Excepciones Personalizadas:** Para manejar casos específicos como `JsonFileNotFoundException`, `JsonReadException` y `ProductNotFoundException`.

Esta estructura permite:
- Desacoplar la lógica de negocio del origen de datos
- Facilitar el testing unitario
- Mantener el código mantenible y escalable
- Permitir futuras implementaciones (Base de datos, API externa, etc.) sin modificar la lógica principal

## Ejemplo de Respuesta

**Lista de productos (`/api/products`):**

```json
[
    {
        "id": 1,
        "name": "Smartphone Galaxy S23 Ultra",
        "price": 1199.99,
        "imageUrl": "https://example.com/images/galaxy-s23-ultra.jpg",
        "description": "Último modelo de Samsung con cámara de 200MP y S Pen incluido",
        "rating": 4.8,
        "specifications": {
            "storage": "512GB",
            "ram": "12GB",
            "screen": "6.8 inch Dynamic AMOLED",
            "battery": "5000mAh"
        }
    },
    {
        "id": 2,
        "name": "MacBook Pro 14",
        "price": 1999.99,
        "imageUrl": "https://example.com/images/macbook-pro-14.jpg",
        "description": "Portátil profesional con chip M2 Pro y pantalla Liquid Retina XDR",
        "rating": 4.9,
        "specifications": {
            "processor": "M2 Pro",
            "ram": "16GB",
            "storage": "1TB SSD",
            "screen": "14-inch"
        }
    }
```

- Cobertura de pruebas >80%
- Documentación clara y concisa
- Código mantenible y escalable


## Cómo ejecutar el proyecto
Para instrucciones detalladas, ver [`run.md`](./run.md)
