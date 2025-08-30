<?php

namespace Royers\Valiphant\App;

use ReflectionClass;
use Royers\Valiphant\Validation\Rules\NotBlank;

class User
{
    #[NotBlank]
    public string $userName;

    public function __construct(string $userName)
    {

        $reflection = new ReflectionClass(self::class);
        $props = $reflection->getProperties();

        echo "<pre>";
        foreach ($props as $prop) {
            var_dump($prop->getAttributes());
        }
        echo "</pre>";

        $this->userName = $userName;
    }

}
