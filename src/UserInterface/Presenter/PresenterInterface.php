<?php

namespace TBoileau\CleanArchitecture\UserInterface\Presenter;

use Symfony\Component\OptionsResolver\OptionsResolver;
use TBoileau\CleanArchitecture\UserInterface\ViewModel\ViewModel;

/**
 * Interface PresenterInterface
 * @package TBoileau\CleanArchitecture\UserInterface\Presenter
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface PresenterInterface
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configure(OptionsResolver $resolver): void;

    /**
     * @param string $viewModelClass
     * @param array $data
     * @return ViewModel
     */
    public function write(string $viewModelClass, array $data): ViewModel;
}
