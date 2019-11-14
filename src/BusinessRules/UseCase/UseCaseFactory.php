<?php

namespace TBoileau\CleanArchitecture\BusinessRules\UseCase;

use Symfony\Component\DependencyInjection\ServiceLocator;
use TBoileau\CleanArchitecture\BusinessRules\Request\RequestFactoryInterface;
use TBoileau\CleanArchitecture\BusinessRules\Resolver\UseCaseResolver;
use TBoileau\CleanArchitecture\BusinessRules\Response\ResponseFactoryInterface;
use TBoileau\CleanArchitecture\BusinessRules\Response\ResponseInterface;

/**
 * Class UseCaseFactory
 * @package TBoileau\CleanArchitecture\BusinessRules\UseCase
 * @author Thomas Boileau <t-boileau@email.com>
 */
class UseCaseFactory implements UseCaseFactoryInterface
{
    /**
     * @var ServiceLocator
     */
    private $serviceLocator;

    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    private $responseFactory;

    /**
     * @var UseCaseResolver
     */
    private $useCaseResolver;

    /**
     * UseCaseFactory constructor.
     * @param ServiceLocator $serviceLocator
     * @param RequestFactoryInterface $requestFactory
     * @param ResponseFactoryInterface $responseFactory
     * @param UseCaseResolver $useCaseResolver
     */
    public function __construct(
        ServiceLocator $serviceLocator,
        RequestFactoryInterface $requestFactory,
        ResponseFactoryInterface $responseFactory,
        UseCaseResolver $useCaseResolver
    ) {
        $this->serviceLocator = $serviceLocator;
        $this->requestFactory = $requestFactory;
        $this->responseFactory = $responseFactory;
        $this->useCaseResolver = $useCaseResolver;
    }

    /**
     * @inheritDoc
     */
    public function execute(string $useCaseClass, array $data = []): ResponseInterface
    {
        $useCaseAnnotation = $this->useCaseResolver->resolve($useCaseClass);

        $request = $this->requestFactory->create(
            $useCaseAnnotation->request,
            $data
        );

        /** @var UseCaseInterface $useCase */
        $useCase = $this->serviceLocator->get($useCaseClass);

        $responseData = $useCase->execute($request);
        
        return $this->responseFactory->create(
            $useCaseAnnotation->response,
            $responseData
        );
    }
}
