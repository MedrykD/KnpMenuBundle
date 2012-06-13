<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace My\MenuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->addChild('O firmie', array('route' => '_ofirmie'));
        // ... add more children

        return $menu;
    }
}
