## Tienda en línea Noir

### Instalación

Después de descargar el proyecto con `git clone` se deben ejecutar los siguientes pasos:

* `composer install` (O `./composer.phar install` si usan composer localmente)
* `cp .env.example .env`
* `php artisan key:generate`
* Editar el archivo `.env` para configurar la base de datos

### Overview de la tienda

La tienda en línea vendera *PIEZAS* (`ModelItem`). Cada pieza tiene posibles configuraciones de *TALLA* (`Size`) y *COLOR* (`Color`). 

Cada pieza pertence a un *MODELO* (`Model`). _Yo preferiría llamarlos categorías, pero el cliente así los nombró_. A su vez, un modelo pertenece a una *SUBCOLECCIÓN* (`Subcollection`) y ésta a su vez a una *COLECCIÓN* (`Collection`).

Cada uno de los modelos descritos anteriormente posee un _*sku*_ de dos dígitos (A excepción de las piezas que tiene un caracter y dos dígitos). Así, formamos un _SKU_ para cada artículo vendido en la tienda (`Stock`). El sku ejemplo es *010345A890223*. Este SKU representa a la pieza _A89_ de la colección _01_, subcolección _03_, modelo _45_ de color _02_ y talla _23_.

Los artículos de la tienda no son listados como tal en las páginas de la tienda dado que, por ejemplo, un calzón no suele venderse solo, si no en conjunto con su Brassier. Es por ello que en la tienda se listan *CONJUNTOS* (`Set`). Cada conjunto tiene una o más *FOTOS* (`SetPhoto`). Al seleccionar un conjunto en la tienda deben cargarse todos las piezas que tiene y poder seleccionar la configuración de talla y color deseada.

### TESTING

Para generar una base de datos de colecciones, subcolecciones, modelos, piezas, colores, tallas y conjuntos existe el `FakeSeeder`.

Para crear stock existe el `StockFakeSeeder`.