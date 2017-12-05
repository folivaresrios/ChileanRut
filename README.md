ChileanRut Package
===================
[ ![Codeship Status for folivaresrios/chileanrut](https://app.codeship.com/projects/2ddc2100-a971-0135-97c3-36f7001b53e6/status?branch=master)](https://app.codeship.com/projects/256360) [![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

ChileanRut entrega una serie de metodos que permite verificar la validez del Rut Chileno.

El package sigue los estandares [PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md), [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md), and [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md). 

Requerimientos
------------
La rama Master posee los siguiente requerimientos

* PHP 5.6 o mayor.

Como Instalar
---------------
_[Usando [Composer](http://getcomposer.org/)]_

Agrega el package en `composer.json` - de la siguiente manera:

```javascript
{
  "require": {
    "folivaresrios/chileanrut": "^1.0"
  }
}
```

o a traves de linea de comando

```
composer require folivaresrios/chileanrut
```
Como Usar
------------

Solo debe importar el trait llamado ChileanRut ubicado en el namespace KissDev\ChileanRut\Traits donde quieras usar los metodos.

** Metodos
```php
function clean($rut, $hasCheckDigit = true)
```

Esta funcion recibe 2 parametros, donde se le entrega el string ($rut) y opcionalmente si quiere retornar el rut con guion o sin guion.
La funcionalidad de esta, es limpiar los "puntos", "guiones", "ceros a la izquierda" y "espacios adicionales"

```php
function hasValidLength($rut)
```

Determina si el rut tiene el largo valido

```php
function verify($rut);
```
Determina si es un rut valido 



## Reporte errores

Si tienes problemas con ChileanRut, abre un "issue" en [GitHub](https://github.com/folivaresrios/chileanrut/issues).

## Contribuye

Si quieres contribuir con ChileanRut creado algo que quiereas agregar,envia un [pull
requests](https://help.github.com/articles/using-pull-requests) o abre un
[issues](https://github.com/folivaresrios/chileanrut/issues).
