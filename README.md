Resty - Json API Error
=======================

Framework agnostic [JSON-API Errors](http://jsonapi.org/format/#errors) (v1.0) implementation

[![Build Status](https://travis-ci.org/mostofreddy/resty-json-api-error.svg?branch=master)](https://travis-ci.org/mostofreddy/resty-json-api-error)
[![Latest Stable Version](https://poser.pugx.org/restyphp/json-api-error/v/stable)](https://packagist.org/packages/restyphp/json-api-error)
[![License](https://poser.pugx.org/restyphp/json-api-error/license)](https://packagist.org/packages/restyphp/json-api-error)
[![Total Downloads](https://poser.pugx.org/restyphp/json-api-error/downloads)](https://packagist.org/packages/restyphp/json-api-error)
[![composer.lock](https://poser.pugx.org/restyphp/json-api-error/composerlock)](https://packagist.org/packages/restyphp/json-api-error)


Versión estable
---------------

0.1.0

JSON API Errors
---------------

La especificación de [errores de JSON API](http://jsonapi.org/format/#errors) define __objetos error__ para proporcionar información adicional acerca de los problemas encontrados durante un request pudiendo devolver uno o mas objetos dentro de un array.

Un objeto de error puede tener los siguientes atributos:

* __id__: Identificador único para esta ocurrencia particular del problema.
* __links__: [Objeto Links](http://jsonapi.org/format/#document-links) que contiene los siguientes miembros:
    * *about*: Enlace que conduce a mayores detalles sobre esta ocurrencia del problema.
* __status__: Código de estado HTTP del problema, expresado como un valor string.
* __code__: Código de error específico de la aplicación, expresado como un valor string.
* __title__: Breve resumen del problema. NO DEBE cambiar si el problema se repite.
* __detail__: Explicación mas detallada del problema.
* __source__: Un objeto que contiene referencias a la fuente del error, opcionalmente incluyendo cualquiera de los siguientes miembros:
    * *pointer*: JSON Pointer [RFC6901](https://tools.ietf.org/html/rfc6901) para la entidad asociada en el documento de solicitud [por ejemplo, `/data` para un objeto de datos principal, o `/data/attributes/title` para un atributo específico].
    * *parameter*: Cadena que indica qué parámetro de consulta URI provocó el error.
*meta: [Objeto meta](http://jsonapi.org/format/#document-meta) que contiene meta-información no estándar sobre el error.


__Formato ejemplo__

```
{
    "errors": [
        {...},
        {...}
    ]
}
```

Requerimientos
--------------

* PHP 7+

Instalación
-----------

```
{
    "require": {
        "restyphp/json-api-error": "0.1.*"
    }
}
```

Uso
---

__Ejemplo básico__

```
use Resty\JsonApiError\Message;

$message = new Message();
$message->add("Page not found", "Request => GET:http://localhost/dummy");

echo json_encode($message);
```

Respuesta

```
{
  "errors": [
    {
      "title": "Page not found",
      "details": "Request => GET:http://localhost/dummy"
    }
  ]
}

```

Documentación y API en la Wiki

License
-------

The MIT License (MIT). Ver el archivo [LICENSE](LICENSE.md) para más información
