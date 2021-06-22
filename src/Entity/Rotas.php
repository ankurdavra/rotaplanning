<?php

namespace App\Entity;

use App\Repository\RotasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RotasRepository::class)
 */
class Rotas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=shops::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $shop_id;

    /**
     * @ORM\Column(type="date")
     */
    private $week_commence_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShopId(): ?shops
    {
        return $this->shop_id;
    }

    public function setShopId(?shops $shop_id): self
    {
        $this->shop_id = $shop_id;

        return $this;
    }

    public function getWeekCommenceDate(): ?\DateTimeInterface
    {
        return $this->week_commence_date;
    }

    public function setWeekCommenceDate(\DateTimeInterface $week_commence_date): self
    {
        $this->week_commence_date = $week_commence_date;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }
}
