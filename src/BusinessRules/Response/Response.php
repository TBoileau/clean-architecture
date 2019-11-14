<?php

namespace TBoileau\CleanArchitecture\BusinessRules\Response;

/**
 * Class Response
 * @package TBoileau\CleanArchitecture\BusinessRules\Response
 * @author Thomas Boileau <t-boileau@email.com>
 */
abstract class Response implements ResponseInterface
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
