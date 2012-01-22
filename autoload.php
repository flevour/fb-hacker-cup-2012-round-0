<?php
require_once(__DIR__ . '/vendor/.composer/autoload.php');

use Symfony\Component\ClassLoader\UniversalClassLoader;


$loader = new UniversalClassLoader();
$loader->registerNamespace('FbHack', __DIR__);
$loader->register();

