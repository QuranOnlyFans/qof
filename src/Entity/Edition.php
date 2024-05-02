<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Edition
 *
 * @ORM\Table(name="edition")
 * @ORM\Entity
 */
class Edition
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="identifier", type="string", length=255, nullable=false)
     */
    private $identifier;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255, nullable=false)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="englishName", type="string", length=255, nullable=false)
     */
    private $englishname;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255, nullable=false)
     */
    private $format;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEnglishName(): ?string
    {
        return $this->englishname;
    }

    public function getFormat(): ?string
    {
        return $this->format;
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
    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;
        return $this;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setEnglishName(string $englishName): self
    {
        $this->englishname = $englishName;
        return $this;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;
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
