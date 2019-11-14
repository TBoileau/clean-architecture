<?php

namespace TBoileau\CleanArchitecture\BusinessRules\Response;

/**
 * Interface RequestFactoryInterface
 * @package TBoileau\CleanArchitecture\BusinessRules\Response
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface ResponseFactoryInterface
{
    /**
     * @param string $responseClass
     * @return ResponseInterface
     */
    public function create(string $responseClass, array $data): ResponseInterface;
}
