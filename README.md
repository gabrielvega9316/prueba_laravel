# Bienvenido al test Laravel de Adoclic

## Configuración del entorno

Ejecutar composer para instalar las dependencias necesarias
```sh
composer install
```

1. Configura la base de datos editando el archivo `.env` y reemplaza los siguientes valores con la información de tu entorno:
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

2. Ejecuta las migraciones y los seeders para armar la base de datos:

```sh
php artisan migrate --seed
```

## Levantar el proyecto

Para iniciar el servidor de desarrollo de Laravel, ejecuta el siguiente comando:
```sh
php artisan serve
```

El proyecto estará disponible en la dirección local [http://localhost:8000](http://localhost:8000).

## Uso de la API

La API proporciona un conjunto de endpoints para interactuar con el desafio. A continuación se muestra la ruta de la API y los métodos disponibles:

Te facilito la collection para importar, asi interactúes con la API, Puedes obtenerla [Aqui](https://github.com/gabrielvega9316/prueba_laravel/blob/test/resources/docs/test_adoclic.postman_collection.json)

Los endpoints correspondientes a los métodos mencionados son los siguientes:

- GET /populate: Ejecuta el metodo para poblar la tabla entidades de la base de datos con las categorias correspondientes.
- GET /{category}: Con este endpoint, es posible obtener el listado de entidades pertenecientes a una categoría específica. Para obtener los datos, se debe pasar el nombre de la categoría como parámetro en la ruta de la solicitud. Por ejemplo, si se desea obtener las entidades de la categoría "Animals", se realizará una solicitud a "/Animals" y el sistema devolverá el listado correspondiente.


## Challenge

Para completar este ejercicio de prueba de Laravel, sigue los siguientes pasos:

## Instalación de Laravel
1. Instala Laravel Framework 10.
2. Utiliza una base de datos MySQL.

## Creación de los modelos de datos
1. Crea dos modelos de datos: `Entity` y `Category`.
2. Define las propiedades de cada modelo según las siguientes especificaciones:

`Entity`:
- id
- api
- description
- link
- category_id

`Category`:
- id
- category

## Creación del seeder para categorías
1. Crea un seeder para insertar las categorías "Animals" y "Security" en la tabla de categorías.
2. Utiliza el seeder para poblar la tabla con los registros correspondientes.

## Creación del servicio para consultar la API
1. Crea un servicio que consulte la siguiente API: `https://api.publicapis.org/entries`.
2. Extrae las entidades de las categorías "Animals" y "Security" de la respuesta obtenida.
3. Inserta las entidades obtenidas en la tabla de entidades en la base de datos.
4. Utiliza controladores, migraciones, recursos (resources), etc., según consideres necesario.

## Creación de la API
1. Crea una API en la siguiente ruta: `{SITE_URL}/api/{category}`.
2. Esta API debe consultar la base de datos y devolver los datos en formato JSON con la siguiente estructura:

```json
{
    "success": true,
    "data": [
        {
            "api": "Application Environment Verification",
            "description": "Android library and API to verify the safety of user devices, detect rooted devices and other risks",
            "link": "https://github.com/fingerprintjs/aev",
            "category": {
                "id": 1,
                "category": "Security"
            }
        },
        {
            "api": "BinaryEdge",
            "description": "Provide access to BinaryEdge 40fy scanning platform",
            "Auth": "apiKey",
            "link": true,
            "category": {
                "id": 1,
                "category": "Security"
            }
        },
        ...
    ]
}
```

Recuerda ajustar `{SITE_URL}` con la URL correspondiente a tu aplicación.

Este ejercicio busca evaluar tus habilidades en Laravel y la implementación de una API que consulte datos externos y los almacene en una base de datos.
