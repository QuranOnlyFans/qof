<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="text", length=65535, nullable=false)
     */
    private $data;

    /**
     * @var bool
     *
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
     * @var \Ayahs
     *
     * @ORM\ManyToOne(targetEntity="Ayahs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ayah_id", referencedColumnName="id")
     * })
     */
    private $ayah;

    /**
     * @var \Editions
     *
     * @ORM\ManyToOne(targetEntity="Editions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="edition_id", referencedColumnName="id")
     * })
     */
    private $edition;


}
