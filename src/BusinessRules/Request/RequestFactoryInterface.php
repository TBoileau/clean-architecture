<?php

namespace TBoileau\CleanArchitecture\BusinessRules\Request;

/**
 * Interface RequestFactoryInterface
 * @package TBoileau\CleanArchitecture\BusinessRules\Request
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface RequestFactoryInterface
{
    /**
     * @param string $requestClass
     * @param array $data
     * @return RequestInterface
     */
    public function create(string $requestClass, array $data = []): RequestInterface;
}
