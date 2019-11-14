<?php

namespace TBoileau\CleanArchitecture\Tests\BusinessRules\UseCase;

use TBoileau\CleanArchitecture\BusinessRules\Annotation\UseCase;
use TBoileau\CleanArchitecture\BusinessRules\Request\RequestInterface;
use TBoileau\CleanArchitecture\BusinessRules\UseCase\UseCaseInterface;

/**
 * Class UseCaseStub
 * @package TBoileau\CleanArchitecture\Tests\BusinessRules\UseCasse
 * @author Thomas Boileau <t-boileau@email.com>
 * @UseCase(
 *     request="TBoileau\CleanArchitecture\Tests\BusinessRules\Request\RequestStub",
 *     response="TBoileau\CleanArchitecture\Tests\BusinessRules\Response\ResponseStub"
 * )
 */
class UseCaseStub implements UseCaseInterface
{
    /**
     * @inheritDoc
     */
    public function execute(RequestInterface $request): array
    {
        return [];
    }
}
