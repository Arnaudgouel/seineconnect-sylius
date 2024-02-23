<?php

declare(strict_types=1);

namespace App\Entity\Channel;

use Doctrine\ORM\Mapping as ORM;
use MonsieurBiz\SyliusMenuPlugin\Entity\Menu;
use Sylius\Component\Core\Model\Channel as BaseChannel;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_channel")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_channel')]
class Channel extends BaseChannel
{
    #[ORM\Column(nullable: true)]
    private ?bool $isRelatedToCustomMenu = null;

    #[ORM\ManyToOne]
    private ?Menu $headerMenu = null;

    #[ORM\ManyToOne]
    private ?Menu $footerMenu = null;

    public function isIsRelatedToCustomMenu(): ?bool
    {
        return $this->isRelatedToCustomMenu;
    }

    public function setIsRelatedToCustomMenu(?bool $isRelatedToCustomMenu): static
    {
        $this->isRelatedToCustomMenu = $isRelatedToCustomMenu;

        return $this;
    }

    public function getHeaderMenu(): ?Menu
    {
        return $this->headerMenu;
    }

    public function setHeaderMenu(?Menu $headerMenu): static
    {
        $this->headerMenu = $headerMenu;

        return $this;
    }

    public function getFooterMenu(): ?Menu
    {
        return $this->footerMenu;
    }

    public function setFooterMenu(?Menu $footerMenu): static
    {
        $this->footerMenu = $footerMenu;

        return $this;
    }
}
