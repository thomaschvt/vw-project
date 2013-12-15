<?php

namespace VintageWest\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VintageWestFrontBundle:Default:index.html.twig');
    }
    public function prestationAction()
    {
        return $this->render('VintageWestFrontBundle:Prestation:prestation.html.twig');
    }
}
