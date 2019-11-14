<?php

namespace TBoileau\CleanArchitecture\UserInterface\Presenter;

use Symfony\Component\DependencyInjection\ServiceLocator;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TBoileau\CleanArchitecture\UserInterface\ViewModel\ViewModel;

/**
 * Class Presenter
 * @package TBoileau\CleanArchitecture\UserInterface\Presenter
 * @author Thomas Boileau <t-boileau@email.com>
 */
class Presenter implements PresenterInterface
{
    /**
     * @var ServiceLocator
     */
    private $serviceLocator;

    /**
     * Presenter constructor.
     * @param ServiceLocator $serviceLocator
     */
    public function __construct(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * @param string $viewModelClass
     * @param array $data
     * @return ViewModel
     */
    public function write(string $viewModelClass, array $data): ViewModel
    {
        /** @var ViewModel $viewModel */
        $viewModel = $this->serviceLocator->get($viewModelClass);

        $resolver = new OptionsResolver();

        $viewModel->configure($resolver);

        $viewModel->setData($resolver->resolve($data));

        return $viewModel;
    }
}
