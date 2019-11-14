<?php

namespace TBoileau\CleanArchitecture\BusinessRules\UseCase;

use TBoileau\CleanArchitecture\BusinessRules\Request\RequestInterface;

/**
 * Interface UseCaseInterface
 * @package TBoileau\CleanArchitecture\BusinessRules\UseCase
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface UseCaseInterface
{
    /**
     * @param RequestInterface $request
     * @return array
     */
    public function execute(RequestInterface $request): array;
}
