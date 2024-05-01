<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     *
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


}
