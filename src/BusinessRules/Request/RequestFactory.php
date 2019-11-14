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
        /** @var RequestInterface $request */
        $request = $this->serviceLocator->get($requestClass);

        $resolver = new OptionsResolver();

        $request->configure($resolver);

        $request->setData($resolver->resolve($data));

        return $request;
    }
}
