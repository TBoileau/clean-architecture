<?php

namespace TBoileau\CleanArchitecture\Tests\BusinessRules\Response;

use Symfony\Component\OptionsResolver\OptionsResolver;
use TBoileau\CleanArchitecture\BusinessRules\Request\Request;
use TBoileau\CleanArchitecture\BusinessRules\Response\Response;

/**
 * Class ResponseStub
 * @package TBoileau\CleanArchitecture\Tests\BusinessRules\Response
 * @author Thomas Boileau <t-boileau@email.com>
 */
class ResponseStub extends Response
{
    /**
     * @inheritDoc
     */
    public function configure(OptionsResolver $resolver): void
    {
    }
}
