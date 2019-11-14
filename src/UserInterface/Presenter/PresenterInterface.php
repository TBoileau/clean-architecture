<?php

namespace TBoileau\CleanArchitecture\UserInterface\Presenter;

use TBoileau\CleanArchitecture\UserInterface\ViewModel\ViewModel;

/**
 * Interface PresenterInterface
 * @package TBoileau\CleanArchitecture\UserInterface\Presenter
 * @author Thomas Boileau <t-boileau@email.com>
 */
interface PresenterInterface
{
    /**
     * @param string $viewModelClass
     * @param array $data
     * @return ViewModel
     */
    public function write(string $viewModelClass, array $data): ViewModel;
}
