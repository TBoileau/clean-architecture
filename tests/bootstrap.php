<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use TBoileau\CleanArchitecture\BusinessRules\Annotation\UseCase;

$loader = require __DIR__ . '/../vendor/autoload.php';

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

return $loader;
