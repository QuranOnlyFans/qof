<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Ayah;
use App\Entity\Edition;

/**
 * AyahEdition
 *
 * @ORM\Table(name="ayah_edition", indexes={@ORM\Index(name="ayah_edition_ayah_id_foreign", columns={"ayah_id"}), @ORM\Index(name="ayah_edition_edition_id_foreign", columns={"edition_id"})})
 * @ORM\Entity
 */
class AyahEdition
{
    /**
     * @var int
     *
     * @Groups("ayahEdition")
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="data", type="text", length=65535, nullable=false)
     */
    private $data;

    /**
     * @var bool
     * @Groups("ayahEdition")
     * @ORM\Column(name="is_audio", type="boolean", nullable=false)
     */
    private $isAudio;

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

    /**
     * @var Ayah
     *
     * @ORM\ManyToOne(targetEntity="Ayah")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ayah_id", referencedColumnName="id")
     * })
     */
    private $ayah;

    /**
     * @var Edition
     *
     * @ORM\ManyToOne(targetEntity="Edition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="edition_id", referencedColumnName="id")
     * })
     */
    private $edition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function getIsAudio(): ?bool
    {
        return $this->isAudio;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function getAyah(): ?Ayah
    {
        return $this->ayah;
    }

    public function getEdition(): ?Edition
    {
        return $this->edition;
    }

    public function setData(string $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function setIsAudio(bool $isAudio): self
    {
        $this->isAudio = $isAudio;
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

    public function setAyah(?Ayah $ayah): self
    {
        $this->ayah = $ayah;
        return $this;
    }

    public function setEdition(?Edition $edition): self
    {
        $this->edition = $edition;
        return $this;
    }
}
