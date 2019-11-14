<?php

namespace TBoileau\CleanArchitecture\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ServiceLocator;
use TBoileau\CleanArchitecture\BusinessRules\Request\{
    RequestFactory,
    RequestInterface
};
use TBoileau\CleanArchitecture\BusinessRules\Resolver\UseCaseResolver;
use TBoileau\CleanArchitecture\BusinessRules\Response\{
    ResponseFactory,
    ResponseInterface
};
use TBoileau\CleanArchitecture\BusinessRules\UseCase\{
    UseCaseFactory,
    UseCaseInterface
};

/**
 * Class TestUseCase
 * @package TBoileau\CleanArchitecture\Tests
 */
abstract class TestUseCase extends TestCase
{
    /**
     * @return UseCaseInterface
     */
    abstract public function getUseCase(): UseCaseInterface;

    /**
     * @return ResponseInterface
     */
    abstract public function getResponse(): ResponseInterface;

    /**
     * @return RequestInterface
     */
    abstract public function getRequest(): RequestInterface;

    /**
     * @return array|\Generator
     */
    abstract public function provideData();

    /**
     * @dataProvider provideData
     * @param array $requestData
     * @param array $responseData
     */
    public function testExecute(array $requestData, array $responseData): void
    {
        $requestServiceLocator = $this->createMock(ServiceLocator::class);
        $requestServiceLocator->method("get")->willReturn($this->getRequest());

        $requestFactory = new RequestFactory($requestServiceLocator);

        $responseServiceLocator = $this->createMock(ServiceLocator::class);
        $responseServiceLocator->method("get")->willReturn($this->getResponse());

        $responseFactory = new ResponseFactory($responseServiceLocator);

        $useCase = $this->getUseCase();

        $useCaseServiceLocator = $this->createMock(ServiceLocator::class);
        $useCaseServiceLocator->method("get")->willReturn($useCase);

        $useCaseFactory = new UseCaseFactory(
            $useCaseServiceLocator,
            $requestFactory,
            $responseFactory,
            new UseCaseResolver()
        );

        $response = $useCaseFactory->execute(get_class($useCase), $requestData);

        $this->assertEquals($responseData, $response->getData());
    }
}
