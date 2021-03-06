<?php

namespace TBoileau\CleanArchitecture\BusinessRules\Resolver;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use TBoileau\CleanArchitecture\BusinessRules\Annotation\UseCase;

/**
 * Class RequestResolver
 * @package TBoileau\CleanArchitecture\BusinessRules\Resolver
 * @author Thomas Boileau <t-boileau@email.com>
 */
class UseCaseResolver
{
    /**
     * @param string $class
     * @return UseCase
     * @throws \Doctrine\Common\Annotations\AnnotationException
     * @throws \ReflectionException
     */
    public function resolve(string $class): UseCase
    {
        $reflectionClass = new \ReflectionClass($class);

        $reader = new AnnotationReader();

        AnnotationRegistry::registerUniqueLoader('class_exists');

        return $reader->getClassAnnotation($reflectionClass, UseCase::class);
    }
}
