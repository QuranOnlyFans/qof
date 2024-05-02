<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Surah
 *
 * @ORM\Table(name="surah")
 * @ORM\Entity
 */
class Surah
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var string
     * @ORM\Column(name="name_ar", type="string", length=255, nullable=false)
     */
    private $nameAr;

    /**
     * @var string
     * @ORM\Column(name="name_en", type="string", length=255, nullable=false)
     */
    private $nameEn;

    /**
     * @var string
     * @ORM\Column(name="name_en_translation", type="string", length=255, nullable=false)
     */
    private $nameEnTranslation;

    /**
     * @var string
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime|null
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function getNameAr(): ?string
    {
        return $this->nameAr;
    }

    public function getNameEn(): ?string
    {
        return $this->nameEn;
    }

    public function getNameEnTranslation(): ?string
    {
        return $this->nameEnTranslation;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    // Setters
    public function setNumber(int $number): self
    {
        $this->number = $number;
        return $this;
    }

    public function setNameAr(string $nameAr): self
    {
        $this->nameAr = $nameAr;
        return $this;
    }

    public function setNameEn(string $nameEn): self
    {
        $this->nameEn = $nameEn;
        return $this;
    }

    public function setNameEnTranslation(string $nameEnTranslation): self
    {
        $this->nameEnTranslation = $nameEnTranslation;
        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
