<?php

namespace VintageWest\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VintageWestAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
