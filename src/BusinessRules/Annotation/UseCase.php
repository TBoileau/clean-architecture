<?php

namespace TBoileau\CleanArchitecture\BusinessRules\Annotation;

/**
 * Class UseCase
 * @package TBoileau\CleanArchitecture\BusinessRules\Annotation
 * @author Thomas Boileau <t-boileau@email.com>
 * @Annotation
 * @Target("CLASS")
 */
class UseCase
{
    /**
     * @var string
     * @required
     */
    public $request;

    /**
     * @var string
     * @required
     */
    public $response;
}
