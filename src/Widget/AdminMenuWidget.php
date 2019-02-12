<?php

namespace DigipolisGent\SymfonyCommon\Widget;

use DigipolisGent\AdminLteBundle\Widget\Widget;
use Knp\Menu\Twig\Helper;

class AdminMenuWidget implements Widget
{
    /**
     * @var Helper
     */
    private $knpMenuHelper;

    /**
     * SidebarMenuWidget constructor.
     *
     * @param Helper $knpMenuHelper
     */
    public function __construct(Helper $knpMenuHelper)
    {
        $this->knpMenuHelper = $knpMenuHelper;
    }

    public function __invoke(array $options = [])
    {
        return (string)$this->knpMenuHelper->render('admin_menu', [
            'ancestorClass'     => 'active',
            'currentClass'      => 'active',
            'allow_safe_labels' => true,
            'template'          => '@SymfonyCommon/menu/knp_menu_lite.html.twig',
        ]);
    }

    public function getType()
    {
        return Widget::TYPE_SIDEBAR_LEFT;
    }

    public function getAlias()
    {
        return 'sf_commin.widget.admin_menu';
    }
}
