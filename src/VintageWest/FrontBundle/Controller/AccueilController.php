<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 12/14/13
 * Time: 6:05 PM
 */

namespace VintageWest\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use VintageWest\AdminBundle\Entity\News;
use VintageWest\AdminBundle\Entity\ImageIllustration;

class AccueilController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entitiesNews = $em->getRepository('VintageWestAdminBundle:News')->findByLang(2);
        $entitiesIllustration = $em->getRepository('VintageWestAdminBundle:ImageIllustration')->findByisInCarrousel(true);

        return $this->render('VintageWestFrontBundle:Accueil:accueil.html.twig',array('newsPerLang'=>$entitiesNews, 'imgsCarrousel'=>$entitiesIllustration));
    }

   public function traductionAction($lang)
   {
       /*Défini la local en fonction du drapeau choisit dans le header
       * Redirige vers l'index
       */
       $request = $this->getRequest();
       $request->setLocale($lang);

      return $this->indexAction();
   }

}