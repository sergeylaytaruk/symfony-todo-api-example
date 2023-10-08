<?php

namespace App\Models;

class CategoryDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public ?int $id,
    ) {
    }
}
