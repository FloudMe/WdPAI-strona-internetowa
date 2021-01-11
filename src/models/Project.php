<?php


class Project
{
    private $title;
    private $description;
    private $image;
    private $id;
    private $id_animal_category;
    private $id_user;

    public function __construct(string $title, string $description, string $image, int $id=null, int $id_animal_category=null, int $id_user=null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->id = $id;
        $this->id_animal_category = $id_animal_category;
        $this->id_user = $id_user;
    }

    public function getIdAnimalCategory(): ?int
    {
        return $this->id_animal_category;
    }

    public function setIdAnimalCategory(?int $id_animal_category): void
    {
        $this->id_animal_category = $id_animal_category;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(?int $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }


}