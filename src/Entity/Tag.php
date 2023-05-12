<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $icon = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToMany(targetEntity: TagCategory::class, inversedBy: 'tags')]
    private Collection $tag_category;

    public function __construct()
    {
        $this->tag_category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, TagCategory>
     */
    public function getTagCategoryId(): Collection
    {
        return $this->tag_category;
    }

    public function addTagCategoryId(TagCategory $tagCategoryId): self
    {
        if (!$this->tag_category->contains($tagCategoryId)) {
            $this->tag_category->add($tagCategoryId);
        }

        return $this;
    }

    public function removeTagCategoryId(TagCategory $tagCategoryId): self
    {
        $this->tag_category->removeElement($tagCategoryId);

        return $this;
    }
}
