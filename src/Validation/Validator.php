<?php

namespace Royers\Phalidator\Validation;

use ReflectionClass;
use Royers\Phalidator\Helpers\Tuple;

class Validator
{
    /**
  * @return Tuple<bool, array>
  */
    public static function validate(object $obj): Tuple
    {
        $errors = [];

        $reflection = new ReflectionClass($obj);

        $classProps = $reflection->getProperties();
        $classAttrs = $reflection->getAttributes();

        foreach ($classAttrs as $attribute) {
            echo $attribute->getName() . PHP_EOL;
        }

        foreach ($classProps as $prop) {
            $propVal = $prop->getValue($obj);

            foreach ($prop->getAttributes() as $propAttribute) {
                $attributeInstance = $propAttribute->newInstance();

                if (method_exists($attributeInstance, 'validate')) {

                    if (!$attributeInstance->validate($propVal)) {
                        $errors[$prop->getName()] = [
                            'ok' => false,
                            'msg' => "Validation {$propAttribute} not passed for {$prop->getName()}"
                        ];

                        continue;
                    }
                }
            }
        }

        return new Tuple(count($errors) < 1, $errors);
    }
}
