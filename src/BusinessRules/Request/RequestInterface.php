<?php


namespace TBoileau\CleanArchitecture\BusinessRules\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interface RequestInterface
 * @package TBoileau\CleanArchitecture\BusinessRules\Request
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface RequestInterface
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configure(OptionsResolver $resolver): void;

    /**
     * @param string $attribute
     * @return mixed
     */
    public function get(string $attribute);

    /**
     * @return array
     */
    public function getData(): array;

    /**
     * @param array $data
     */
    public function setData(array $data): void;
}
