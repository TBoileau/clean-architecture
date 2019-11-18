<?php

namespace TBoileau\CleanArchitecture\BusinessRules\Representation;

use Countable;
use IteratorAggregate;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interface RepresentationInterface
 * @package TBoileau\CleanArchitecture\BusinessRules\Representation
 * @author Thomas Boileau <t-boileau@email.com>
 * @copyright 2019-2020 Les Ateliers du R.O.I.
 */
interface RepresentationInterface extends Countable, IteratorAggregate
{
    /**
     * @param array $data
     * @return $this
     */
    public function handle(array $data = []): self;

    /**
     * @param OptionsResolver $resolver
     */
    public function configure(OptionsResolver $resolver): void;

    /**
     * @param array $requestData
     * @return array
     */
    public function fetch(array $requestData = []): array;
}
