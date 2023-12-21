<?php

namespace App\Enums;

enum Status: int
{

    case DRAFT = 0;
    case ACTIVE = 1;
    case CLOSED = 2;


    public function readable(): string {
        return match ($this) {
            Status::DRAFT => "Concept",
            Status::ACTIVE => "Actief",
            Status::CLOSED => "Gesloten",
        };
    }


}
