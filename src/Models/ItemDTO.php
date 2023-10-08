<?php

namespace App\Models;

class ItemDTO
{
    public function __construct(
        public string $text,
        public int $categoryId,
        public ?int $id,
    ) {
    }
}
