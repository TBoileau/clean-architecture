<?php

namespace TBoileau\CleanArchitecture\BusinessRules\Request;

/**
 * Class Request
 * @package TBoileau\CleanArchitecture\BusinessRules\Request
 * @author Thomas Boileau <t-boileau@email.com>
 */
abstract class Request implements RequestInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * @inheritDoc
     */
    public function get(string $attribute)
    {
        return $this->data[$attribute];
    }

    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @inheritDoc
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
