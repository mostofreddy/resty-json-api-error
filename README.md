Resty - Json API Error
=======================

Simple implementación del estándar [JSON-API Errors](http://jsonapi.org/format/#errors) (v1.0).


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
