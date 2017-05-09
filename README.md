Resty - Json API Error
=======================

Simple implementación del estándar [JSON-API Errors](http://jsonapi.org/format/#errors) (v1.0).

[![Build Status](https://travis-ci.org/mostofreddy/resty-json-api-error.svg?branch=master)](https://travis-ci.org/mostofreddy/resty-json-api-error)
[![Latest Stable Version](https://poser.pugx.org/restyphp/json-api-error/v/stable)](https://packagist.org/packages/restyphp/json-api-error)
[![License](https://poser.pugx.org/restyphp/json-api-error/license)](https://packagist.org/packages/restyphp/json-api-error)
[![Total Downloads](https://poser.pugx.org/restyphp/json-api-error/downloads)](https://packagist.org/packages/restyphp/json-api-error)
[![composer.lock](https://poser.pugx.org/restyphp/json-api-error/composerlock)](https://packagist.org/packages/restyphp/json-api-error)


Versión estable
---------------

0.1.0

License
-------

The MIT License (MIT). Ver el archivo [LICENSE](LICENSE.md) para más información

Documentación
-------------

### Requerimientos

* PHP 7+

### Instalación

```
{
    "require": {
        "restyphp/json-api-error": "0.1.*"
    }
}
```

### Ejemplo sencillo

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
