<?php

namespace VintageWest\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use VintageWest\AdminBundle\Entity\Car;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $countCar = $em->getRepository('VintageWestAdminBundle:Car')->findAllCounted();
        $countNews = $em->getRepository('VintageWestAdminBundle:News')->findAllCounted();
        $countEquipements = $em->getRepository('VintageWestAdminBundle:Equipement')->findAllCounted();
        $countPrestations = $em->getRepository('VintageWestAdminBundle:Prestation')->findAllCounted();
        $countImages = $em->getRepository('VintageWestAdminBundle:ImageIllustration')->findAllCounted();


        return $this->render('VintageWestAdminBundle:Default:index.html.twig',array('nbr_car'=>$countCar,
                                                                                    'nbr_news'=>$countNews,
                                                                                    'nbr_equipements'=>$countEquipements,
                                                                                    'nbr_prestations'=>$countPrestations,
                                                                                    'nbr_images'=>$countImages
                                                                                   ));
    }

}
