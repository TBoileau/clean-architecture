<?php

namespace TBoileau\CleanArchitecture\BusinessRules\UseCase;

use TBoileau\CleanArchitecture\BusinessRules\Response\ResponseInterface;

/**
 * Interface UseCaseFactoryInterface
 * @package TBoileau\CleanArchitecture\BusinessRules\UseCase
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface UseCaseFactoryInterface
{
    /**
     * @param string $useCaseClass
     * @param array $data
     * @return ResponseInterface
     */
    public function execute(string $useCaseClass, array $data = []): ResponseInterface;
}
