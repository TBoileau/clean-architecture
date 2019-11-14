<?php

namespace TBoileau\CleanArchitecture\Tests\BusinessRules;

use PHPUnit\Framework\TestCase;
use TBoileau\CleanArchitecture\BusinessRules\Request\RequestInterface;
use TBoileau\CleanArchitecture\BusinessRules\Response\ResponseInterface;
use TBoileau\CleanArchitecture\BusinessRules\UseCase\UseCaseInterface;
use TBoileau\CleanArchitecture\Tests\BusinessRules\Request\RequestStub;
use TBoileau\CleanArchitecture\Tests\BusinessRules\Response\ResponseStub;
use TBoileau\CleanArchitecture\Tests\BusinessRules\UseCase\UseCaseStub;
use TBoileau\CleanArchitecture\Tests\TestUseCase;

/**
 * Class UseCaseTest
 * @package TBoileau\CleanArchitecture\Tests\BusinessRules
 * @author Thomas Boileau <t-boileau@email.com>
 */
class UseCaseTest extends TestUseCase
{
    /**
     * @inheritDoc
     */
    public function getUseCase(): UseCaseInterface
    {
        return new UseCaseStub();
    }

    /**
     * @inheritDoc
     */
    public function getResponse(): ResponseInterface
    {
        return new ResponseStub();
    }

    /**
     * @inheritDoc
     */
    public function getRequest(): RequestInterface
    {
        return new RequestStub();
    }

    /**
     * @inheritDoc
     */
    public function provideData()
    {
        yield [[],[]];
    }
}
