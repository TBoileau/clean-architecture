<?php

namespace TBoileau\CleanArchitecture\BusinessRules\UseCase;

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

/**
 * Class UseCaseFactory
 * @package TBoileau\CleanArchitecture\BusinessRules\UseCase
 * @author Thomas Boileau <t-boileau@email.com>
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
     * @return array
     */
    abstract public function getRequestData(): array;

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    abstract public function assertions(ResponseInterface $response);

    public function testExecute(): void
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

        $response = $useCaseFactory->execute(get_class($useCase), $this->getRequestData());

        $this->assertions($response);
    }
}
