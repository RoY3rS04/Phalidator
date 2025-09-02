<?php

namespace Royers\Phalidator\Helpers;

/**
*
* @template T
* @template U
*
*/
class Tuple
{
    /**
    *
    * @param T $first
    * @param U $second
    *
    */
    public function __construct(
        public $first,
        public $second
    ) {
    }
};
