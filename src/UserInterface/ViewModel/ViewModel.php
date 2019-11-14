<?php

namespace TBoileau\CleanArchitecture\UserInterface\ViewModel;

/**
 * Class ViewModel
 * @package TBoileau\CleanArchitecture\UserInterface\ViewModel
 * @author Thomas Boileau <t-boileau@email.com>
 */
abstract class ViewModel implements ViewModelInterface
{
    /**
     * @var array
     */
    private $data;

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
        if (isset($this->data[$name])) {
            return $this->get($name);
        }

        if (0 == strpos($name, 'get')) {
            return $this->get(lcfirst(substr($name, 3)));
        }


        throw new \BadMethodCallException("Undefined method '$name' or property '$name'. The name must start with get !");
    }

    /**
     * @inheritDoc
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
