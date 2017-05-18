![Resty - Json API Error](https://mostofreddy.github.io/resty-json-api-error/images/resty-json-api-errors.png)

[![Build Status](https://travis-ci.org/mostofreddy/resty-json-api-error.svg?branch=master)](https://travis-ci.org/mostofreddy/resty-json-api-error)
[![Latest Stable Version](https://poser.pugx.org/restyphp/json-api-error/v/stable)](https://packagist.org/packages/restyphp/json-api-error)
[![License](https://poser.pugx.org/restyphp/json-api-error/license)](https://packagist.org/packages/restyphp/json-api-error)
[![Total Downloads](https://poser.pugx.org/restyphp/json-api-error/downloads)](https://packagist.org/packages/restyphp/json-api-error)
[![composer.lock](https://poser.pugx.org/restyphp/json-api-error/composerlock)](https://packagist.org/packages/restyphp/json-api-error)


Resty - JSON API Errors, es una librería PHP (agnostica a cualquier Framework) que permite estandarizar y serializar de forma fácil cualquier mensaje de error que pueda devolver una API Restfull, para ello utiliza el estándar [JSON-API](http://jsonapi.org/).

Para mas detalle ver [documentación en wiki](https://github.com/mostofreddy/resty-json-api-error/wiki/Introducci%C3%B3n)


Versión estable
---------------

0.1.0

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

Documentación
-------------

Documentación y API en [Wiki](https://github.com/mostofreddy/resty-json-api-error/wiki)

Ejemplo de uso básico
---------------------

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


License
-------

The MIT License (MIT). Ver el archivo [LICENSE](LICENSE.md) para más información

Test unitario
------------

Los test unitarios utilizan la versión 6.1 de [PHPUnit](https://phpunit.de/)

```
php vendor/bin/phpunit
```

PHPCS
-----

Como estándar de código se emplea [PEAR](https://pear.php.net/manual/en/standards.php) y la versión utilizada de [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer) es la 3.0

```
cp ruleset.xml.dist ruleset.xml
php vendor/bin/phpcs --standard=ruleset.xml
```
