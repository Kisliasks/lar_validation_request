<?php

namespace App\Http\Rules;

use Attribute;

#[Attribute]
class DtoRule
{
    public int $min;
    public int $max;
    public string $date_format;

    public function __construct(int $min = null, int $max = null, string $date_format = null)
    {
        $this->min = $min;
        $this->max = $max;
        $this->date_format = $date_format;
    }
}