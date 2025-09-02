<?php

namespace Royers\Phalidator\Validation;

use ReflectionClass;

class Validator
{
    public static function validate(ReflectionClass $reflection, object $obj)
    {
        $classProps = $reflection->getProperties();
        $classAttrs = $reflection->getAttributes();

        foreach ($classAttrs as $attribute) {
            echo $attribute->getName() . PHP_EOL;
        }

        echo "<pre>";
        foreach ($classProps as $prop) {
            $propVal = $prop->getValue($obj);

            foreach ($prop->getAttributes() as $propAttribute) {
                $attributeInstance = $propAttribute->newInstance();

                if (method_exists($attributeInstance, 'validate')) {
                    $attributeInstance->validate($propVal) == false
                        ? print "{$prop->getName()} failed to pass {$propAttribute->getName()} with value {$propVal}"
                        : print "validation successfull";
                }
            }
        }
        echo "</pre>";
    }

}
