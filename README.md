# File-resolver:
[![Latest Version on Packagist](https://img.shields.io/packagist/v/tleckie/file-resolver.svg?style=flat-square)](https://packagist.org/packages/tleckie/file-resolver)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/teodoroleckie/file-resolver/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/teodoroleckie/file-resolver/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/teodoroleckie/file-resolver/badges/build.png?b=master)](https://scrutinizer-ci.com/g/teodoroleckie/file-resolver/build-status/master)
[![Total Downloads](https://img.shields.io/packagist/dt/tleckie/file-resolver.svg?style=flat-square)](https://packagist.org/packages/tleckie/file-resolver)

Simple file resolver.   

### Installation

You can install the package via composer:

```bash
composer require tleckie/file-resolver
```

### Usage


```php
<?php

require "vendor/autoload.php";

use Tleckie\FileResolver\Resolver;

$resolver = new Resolver(
    '/tmp/test/',
    'de9f2c7fd25e1b3afad3e85a0bd17d9b100db4b3',
    'json',
    4,
    5
);


$resolver->fullName();
// /tmp/test/de9f2/c7fd2/5e1b3/afad3/de9f2c7fd25e1b3afad3e85a0bd17d9b100db4b3.json


$resolver->fullPath();
// /tmp/test/de9f2/c7fd2/5e1b3/afad3/


$resolver->file();
// de9f2c7fd25e1b3afad3e85a0bd17d9b100db4b3.json
```