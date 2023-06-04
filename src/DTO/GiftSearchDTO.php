<?php

namespace App\DTO;

use Doctrine\Common\Collections\ArrayCollection;

class GiftSearchDTO
{
    private ?string $price = null;
    private ?int $gender = null;
    private ?array $tags = null;

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getGender(): ?int
    {
        return $this->gender;
    }

    public function setGender(?int $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?ArrayCollection $tags): self
    {
        if ($tags instanceof ArrayCollection) {
            $tags = $tags->toArray();
        }
        $this->tags = $tags;
        return $this;
    }
}
