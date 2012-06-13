<?php

namespace My\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
    
     /**
     * @Route("/", name="_ofirmie")
     * @Template()
     */
    public function ofirmieAction()
    {
        return array();
    }
    
     /**
     * @Route("/tabela")
     * @Template()
     */
    public function tabelaAction()
    {
$em = $this->get('doctrine.orm.entity_manager');
$dql = "SELECT a FROM VendorBlogBundle:Article a";
$query = $em->createQuery($dql);

$paginator = $this->get('knp_paginator');
$pagination = $paginator->paginate(
    $query,
    $this->get('request')->query->get('page', 1)/*page number*/,
    10/*limit per page*/
);

// parameters to template
return compact('pagination');
    }
    
}
