<?php


class Project
{
    private $title;
    private $description;
    private $image;
    private $id;
    private $id_animal_category;
    private $id_user;
    private $address;
    private $country;
    private $place;
    private $phone;

    public function __construct(string $title, string $description, string $image, int $id=null, int $id_animal_category=null, int $id_user=null, string $address, string $country, string $place, string $phone)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->id = $id;
        $this->id_animal_category = $id_animal_category;
        $this->id_user = $id_user;
        $this->address = $address;
        $this->country = $country;
        $this->place = $place;
        $this->phone = $phone;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getPlace(): string
    {
        return $this->place;
    }

    public function setPlace(string $place): void
    {
        $this->place = $place;
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