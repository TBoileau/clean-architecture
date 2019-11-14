<?php

namespace TBoileau\CleanArchitecture\UserInterface\ViewModel;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interface ViewModelInterface
 * @package TBoileau\CleanArchitecture\UserInterface\ViewModel
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface ViewModelInterface
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configure(OptionsResolver $resolver): void;

    /**
     * ViewModelInterface constructor.
     * @param array $data
     */
    public function __construct(array $data);
    /**
     * @param string $attribute
     * @return mixed
     */
    public function get(string $attribute);

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments);
}
