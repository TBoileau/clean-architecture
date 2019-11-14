<?php


namespace TBoileau\CleanArchitecture\BusinessRules\Response;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interface ResponseInterface
 * @package TBoileau\CleanArchitecture\BusinessRules\Response
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface ResponseInterface
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
