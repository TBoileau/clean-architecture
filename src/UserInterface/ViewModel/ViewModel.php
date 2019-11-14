<?php

namespace TBoileau\CleanArchitecture\UserInterface\ViewModel;

/**
 * Class ViewModel
 * @package TBoileau\CleanArchitecture\UserInterface\ViewModel
 * @author Thomas Boileau <t-boileau@email.com>
 */
class ViewModel implements ViewModelInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * ViewModel constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param string $attribute
     * @return mixed
     */
    public function get(string $attribute)
    {
        return $this->data[$attribute];
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (0 == strpos($name, 'get')) {
            return $this->get(lcfirst(substr($name, 3)));
        }

        throw new \BadMethodCallException("Undefined method '$name'. The method name must start with get !");
    }
}
