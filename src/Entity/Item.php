<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $category_id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    public function __construct(string $text, int $categoryId, ?int $id)
    {
        $this->setText($text);
        $this->setCategoryId($categoryId);
        $this->id = $id;
    }

    public static function fromDTO(\App\Models\ItemDTO $dto): self
    {
        return new self($dto->text, $dto->categoryId, $dto->id);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): static
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }
}
