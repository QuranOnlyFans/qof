<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Ayah
 *
 * @ORM\Table(name="ayah")
 * @ORM\Entity
 */
class Ayah
{
    /**
     * @var int
     * @Groups("ayahEdition")
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var int
     *
     * @ORM\Column(name="number_in_surah", type="integer", nullable=false)
     */
    private $numberInSurah;

    /**
     * @var int
     *
     * @ORM\Column(name="page", type="integer", nullable=false)
     */
    private $page;

    /**
     * @var int
     *
     * @ORM\Column(name="surah_id", type="integer", nullable=false)
     */
    private $surahId;

    /**
     * @var int
     *
     * @ORM\Column(name="hizb_id", type="integer", nullable=false)
     */
    private $hizbId;

    /**
     * @var int
     *
     * @ORM\Column(name="juz_id", type="integer", nullable=false)
     */
    private $juzId;

    /**
     * @var bool
     *
     * @ORM\Column(name="sajda", type="boolean", nullable=false)
     */
    private $sajda;

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
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function getNumberInSurah(): ?int
    {
        return $this->numberInSurah;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function getSurahId(): ?int
    {
        return $this->surahId;
    }

    public function getHizbId(): ?int
    {
        return $this->hizbId;
    }

    public function getJuzId(): ?int
    {
        return $this->juzId;
    }

    public function getSajda(): ?bool
    {
        return $this->sajda;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;
        return $this;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function setNumberInSurah(int $numberInSurah): self
    {
        $this->numberInSurah = $numberInSurah;
        return $this;
    }

    public function setPage(int $page): self
    {
        $this->page = $page;
        return $this;
    }

    public function setSurahId(int $surahId): self
    {
        $this->surahId = $surahId;
        return $this;
    }

    public function setHizbId(int $hizbId): self
    {
        $this->hizbId = $hizbId;
        return $this;
    }

    public function setJuzId(int $juzId): self
    {
        $this->juzId = $juzId;
        return $this;
    }

    public function setSajda(bool $sajda): self
    {
        $this->sajda = $sajda;
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
