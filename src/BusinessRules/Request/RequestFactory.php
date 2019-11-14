<?php

namespace TBoileau\CleanArchitecture\BusinessRules\Request;

use Symfony\Component\DependencyInjection\ServiceLocator;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RequestFactory
 * @package TBoileau\CleanArchitecture\BusinessRules\Request
 * @author Thomas Boileau <t-boileau@email.com>
 */
class RequestFactory implements RequestFactoryInterface
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var OptionsResolver
     */
    private $resolver;

    /**
     * @var ServiceLocator
     */
    private $serviceLocator;

    /**
     * RequestFactory constructor.
     * @param ServiceLocator $serviceLocator
     */
    public function __construct(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * @inheritDoc
     */
    public function create(string $requestClass, array $data = []): RequestInterface
    {
        $this->request = $this->serviceLocator->get($requestClass);

        $this->resolver = new OptionsResolver();

        $this->request->setData($this->resolver->resolve($data));

        return $this->request;
    }
}
