<?php

namespace Royers\Phalidator\Validation\Rules;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class NotBlank
{
    public function validate(?string $value): bool
    {
        if ($value === null) {
            return false;
        }

        $trimmed = trim($value);

        if (strlen($trimmed) == 0) {
            return false;
        }

        return true;
    }
}
