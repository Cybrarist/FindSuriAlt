<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum StatusEnum: string implements HasLabel
{
    case Found="found";
    case Missing="missing";

    public function getLabel(): ?string
    {
        return $this->name;
    }



    public static function get_badge($value)
    {
        return match ($value){
            self::Missing=>"danger",
            self::Found=>"success",
        };

    }
}
