<?php

namespace TBoileau\CleanArchitecture\BusinessRules\Representation;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class Representation
 * @package TBoileau\CleanArchitecture\BusinessRules\Representation
 * @author Thomas Boileau <t-boileau@email.com>
 * @copyright 2019-2020 Les Ateliers du R.O.I.
 */
abstract class Representation implements RepresentationInterface
{
    /**
     * @var array
     */
    private $requestData;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var int|null
     */
    protected $total;

    /**
     * @inheritDoc
     */
    public function handle(array $data = []): RepresentationInterface
    {
        $resolver = new OptionsResolver();

        $resolver->setRequired(["page", "limit", "field", "order"]);
        $resolver->addAllowedTypes("page", "int");
        $resolver->addAllowedTypes("limit", "int");
        $resolver->addAllowedTypes("field", "string");
        $resolver->addAllowedTypes("order", "string");

        $this->configure($resolver);

        $this->requestData = $resolver->resolve($data);

        $this->data = $this->fetch($this->requestData);

        $this->total = $this->count();

        return $this;
    }

    /**
     * @return array
     */
    public function getRange(): array
    {
        return range(
            max(1, $this->requestData["page"] - 3),
            min($this->getPages(), $this->requestData["page"] + 3)
        );
    }

    /**
     * @return int
     */
    public function getPages(): int
    {
        return ceil($this->total / $this->requestData["limit"]);
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->requestData["page"];
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->requestData["limit"];
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->requestData["field"];
    }

    /**
     * @return string
     */
    public function getOrder(): string
    {
        return $this->requestData["order"];
    }

    /**
     * @return array
     */
    public function getRequestData(): array
    {
        return $this->requestData;
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return $this->data;
    }
}
