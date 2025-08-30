<?php

namespace Royers\Valiphant\Validation;

use ReflectionClass;

function validate(ReflectionClass $reflection)
{

    foreach ($reflection->getAttributes() as $attribute) {
        echo '<pre>';
        var_dump($attribute->getName());
        var_dump($attribute->getArguments());
        var_dump($attribute->newInstance());
        echo '</pre>';
    }

}
