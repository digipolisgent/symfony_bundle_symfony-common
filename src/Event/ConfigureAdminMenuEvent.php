<?php

namespace DigipolisGent\SymfonyCommon\Event;

use Knp\Menu\ItemInterface;
use Knp\Menu\MenuFactory;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ConfigureAdminMenuEvent
 *
 * @package DigipolisGent\SymfonyCommon\Event
 */
class ConfigureAdminMenuEvent extends Event
{
    const EVENT_NAME = 'sf_common.event.configure_menu';

    /**
     * @var ItemInterface
     */
    private $menu;

    /**
     * ConfigureAdminMenuEvent constructor.
     *
     * @param ItemInterface $menu
     */
    public function __construct(ItemInterface $menu)
    {
        $this->menu = $menu;
    }

    /**
     * @return ItemInterface
     */
    public function getMenu()
    {
        return $this->menu;
    }
}
