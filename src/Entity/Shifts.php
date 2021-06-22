<?php

namespace App\Entity;

use App\Repository\ShiftsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShiftsRepository::class)
 */
class Shifts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=rotas::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $rota_id;

    /**
     * @ORM\ManyToOne(targetEntity=staff::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $staff_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_time;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end_time;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\OneToMany(targetEntity=ShiftBreaks::class, mappedBy="shift_id", orphanRemoval=true)
     */
    private $shiftBreaks;

    public function __construct()
    {
        $this->shiftBreaks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRotaId(): ?rotas
    {
        return $this->rota_id;
    }

    public function setRotaId(?rotas $rota_id): self
    {
        $this->rota_id = $rota_id;

        return $this;
    }

    public function getStaffId(): ?staff
    {
        return $this->staff_id;
    }

    public function setStaffId(?staff $staff_id): self
    {
        $this->staff_id = $staff_id;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->start_time;
    }

    public function setStartTime(\DateTimeInterface $start_time): self
    {
        $this->start_time = $start_time;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->end_time;
    }

    public function setEndTime(\DateTimeInterface $end_time): self
    {
        $this->end_time = $end_time;

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

    /**
     * @return Collection|ShiftBreaks[]
     */
    public function getShiftBreaks(): Collection
    {
        return $this->shiftBreaks;
    }

    public function addShiftBreak(ShiftBreaks $shiftBreak): self
    {
        if (!$this->shiftBreaks->contains($shiftBreak)) {
            $this->shiftBreaks[] = $shiftBreak;
            $shiftBreak->setShiftId($this);
        }

        return $this;
    }

    public function removeShiftBreak(ShiftBreaks $shiftBreak): self
    {
        if ($this->shiftBreaks->removeElement($shiftBreak)) {
            // set the owning side to null (unless already changed)
            if ($shiftBreak->getShiftId() === $this) {
                $shiftBreak->setShiftId(null);
            }
        }

        return $this;
    }
}
