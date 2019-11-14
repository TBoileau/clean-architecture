<?php

namespace TBoileau\CleanArchitecture\Tests\BusinessRules\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;
use TBoileau\CleanArchitecture\BusinessRules\Request\Request;

/**
 * Class RequestStub
 * @package TBoileau\CleanArchitecture\Tests\BusinessRules\Request
 * @author Thomas Boileau <t-boileau@email.com>
 */
class RequestStub extends Request
{
    /**
     * @inheritDoc
     */
    public function configure(OptionsResolver $resolver): void
    {
    }
}
