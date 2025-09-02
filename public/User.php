<?php

namespace Royers\Phalidator\App;

use Royers\Phalidator\Validation\Rules\NotBlank;

class User
{
    public function __construct(
        #[NotBlank]
        public string $userName
    ) {
    }

}
