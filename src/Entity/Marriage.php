<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarriageRepository")
 */
class Marriage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $town;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MarriageType", inversedBy="marriages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marriage_type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EconomicSystem", inversedBy="marriages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $economic_system;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Registry", inversedBy="marriage", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $registry;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="marriages", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $partner_first;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="marriages", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $partner_second;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\House", inversedBy="marriages", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $house;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Request", mappedBy="marriage")
     */
    private $requests;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Child", mappedBy="marriage")
     */
    private $children;

    public function __construct()
    {
        $this->requests = new ArrayCollection();
        $this->children = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMarriageType(): ?MarriageType
    {
        return $this->marriage_type;
    }

    public function setMarriageType(?MarriageType $marriage_type): self
    {
        $this->marriage_type = $marriage_type;

        return $this;
    }

    public function getEconomicSystem(): ?EconomicSystem
    {
        return $this->economic_system;
    }

    public function setEconomicSystem(?EconomicSystem $economic_system): self
    {
        $this->economic_system = $economic_system;

        return $this;
    }

    public function getRegistry(): ?Registry
    {
        return $this->registry;
    }

    public function setRegistry(?Registry $registry): self
    {
        $this->registry = $registry;

        return $this;
    }

    public function getPartnerFirst(): ?Partner
    {
        return $this->partner_first;
    }

    public function setPartnerFirst(?Partner $partner_first): self
    {
        $this->partner_first = $partner_first;

        return $this;
    }

    public function getPartnerSecond(): ?Partner
    {
        return $this->partner_second;
    }

    public function setPartnerSecond(?Partner $partner_second): self
    {
        $this->partner_second = $partner_second;

        return $this;
    }

    public function getHouse(): ?House
    {
        return $this->house;
    }

    public function setHouse(?House $house): self
    {
        $this->house = $house;

        return $this;
    }

    /**
     * @return Collection|Request[]
     */
    public function getRequests(): Collection
    {
        return $this->requests;
    }

    public function addRequest(Request $request): self
    {
        if (!$this->requests->contains($request)) {
            $this->requests[] = $request;
            $request->setMarriage($this);
        }

        return $this;
    }

    public function removeRequest(Request $request): self
    {
        if ($this->requests->contains($request)) {
            $this->requests->removeElement($request);
            // set the owning side to null (unless already changed)
            if ($request->getMarriage() === $this) {
                $request->setMarriage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Child[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(Child $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setMarriage($this);
        }

        return $this;
    }

    public function removeChild(Child $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getMarriage() === $this) {
                $child->setMarriage(null);
            }
        }

        return $this;
    }
}
