<?php

namespace TBoileau\CleanArchitecture\BusinessRules\Response;

use Symfony\Component\DependencyInjection\ServiceLocator;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ResponseFactory
 * @package TBoileau\CleanArchitecture\BusinessRules\Response
 * @author Thomas Boileau <t-boileau@email.com>
 */
class ResponseFactory implements ResponseFactoryInterface
{
    /**
     * @var ServiceLocator
     */
    private $serviceLocator;

    /**
     * ResponseFactory constructor.
     * @param ServiceLocator $serviceLocator
     */
    public function __construct(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * @inheritDoc
     */
    public function create(string $responseClass, array $data): ResponseInterface
    {
        $response = $this->serviceLocator->get($responseClass);

        $resolver = new OptionsResolver();

        $response->configure($resolver);

        $response->setData($resolver->resolve($data));

        return $response;
    }
}
