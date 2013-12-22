<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 12/14/13
 * Time: 6:05 PM
 */

namespace VintageWest\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CombisController extends Controller
{
    public function indexAction()
    {

        $session = $this->getRequest()->getSession();
        $foo = $session->get('lang');
        $this->getRequest()->setLocale($foo);
        $locale = $this->getRequest()->getLocale();


        $em = $this->getDoctrine()->getManager();

        $langId = $em->getRepository('VintageWestAdminBundle:Language')->getIdLang($locale);

        $entitiesCar = $em->getRepository('VintageWestAdminBundle:Car')->findByLang($langId);
        $entitiesBlocks = $em->getRepository('VintageWestAdminBundle:Block')->findAllByPageAndLanguage(3,$langId);

        return $this->render('VintageWestFrontBundle:Car:combis_list.html.twig',array('combis'=>$entitiesCar,'blockPerPage'=>$entitiesBlocks));
    }

    public function detailAction($id){
        $em = $this->getDoctrine()->getManager();
        $entityCar = $em->getRepository('VintageWestAdminBundle:Car')->findOneById($id);

        return $this->render('VintageWestFrontBundle:Car:combis_detail.html.twig',array('combi'=>$entityCar));
    }

}