CLEAN ARCHITECTURE
==================

Installation
------------

Download with composer :
```
composer require tboileau/clean-architecture "1.*"
```

Create new use case
-------------------

Create your request and configure it :
```php
<?php

namespace App\BusinessRules\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;
use TBoileau\CleanArchitecture\BusinessRules\Request\Request;

/**
 * Class FooRequest
 * @package App\BusinessRules\Request
 */
class FooRequest extends Request
{
    /**
     * @inheritDoc
     */
    public function configure(OptionsResolver $resolver): void
    {
        $resolver->setRequired("bar");
        $resolver->setDefault("optional", "default_data");
    }
}

```

Same thing for your response :

```php
<?php

namespace App\BusinessRules\Response;

use Symfony\Component\OptionsResolver\OptionsResolver;
use TBoileau\CleanArchitecture\BusinessRules\Response\Response;

/**
 * Class ResponseStub
 * @package TBoileau\CleanArchitecture\Tests\BusinessRules\Response>
 */
class FooResponse extends Response
{
    /**
     * @inheritDoc
     */
    public function configure(OptionsResolver $resolver): void
    {
        $resolver->setRequired("bar");
        $resolver->setDefault("optional", "default_data");
    }
}

```

And now, you can implement your new use case :
```php
<?php

namespace App\BusinessRules\UseCase;

use TBoileau\CleanArchitecture\BusinessRules\Annotation\UseCase;
use TBoileau\CleanArchitecture\BusinessRules\Request\RequestInterface;
use TBoileau\CleanArchitecture\BusinessRules\UseCase\UseCaseInterface;

/**
 * Class Example
 * @package App\BusinessRules\UseCase
 * @UseCase(
 *     request="App\BusinessRules\Request\FooRequest",
 *     response="App\BusinessRules\Response\FooResponse"
 * )
 */
class Example implements UseCaseInterface
{
    /**
     * @inheritDoc
     */
    public function execute(RequestInterface $request): array
    {
        return [
            "bar" => "your_data",
            "optional" => $request->get("optional")
        ];
    }
}

```

Usage
-----

```php
<?php

namespace App\UserInterface\Controller;

use App\BusinessRules\UseCase\Example;
use TBoileau\CleanArchitecture\BusinessRules\Response\ResponseInterface;
use TBoileau\CleanArchitecture\BusinessRules\UseCase\UseCaseFactoryInterface;

/**
 * Class FooController
 * @package App\UserInterface\Controller
 */
class FooController extends AbstractController
{
    public function __invoke(UseCaseFactoryInterface $useCaseFactory)
    {
        /** @var ResponseInterface $response */
        $response = $useCaseFactory->execute(Example::class, ["bar" => "required data"]);
    }
}

```


