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
use Symfony\Component\HttpFoundation\Session\Session;

class AccueilController extends Controller
{
    public function indexAction()
    {

        $locale = $this->getRequest()->getLocale();
        $em = $this->getDoctrine()->getManager();




        $langId = $em->getRepository('VintageWestAdminBundle:Language')->getIdLang($locale);
        $entitiesNews = $em->getRepository('VintageWestAdminBundle:News')->findByLang($langId);
        $entitiesBlocks = $em->getRepository('VintageWestAdminBundle:Block')->findAllByPageAndLanguage(2,$langId);
        $entitiesIllustration = $em->getRepository('VintageWestAdminBundle:ImageIllustration')->findByisInCarrousel(true);

        return $this->render('VintageWestFrontBundle:Accueil:accueil.html.twig',array('newsPerLang'=>$entitiesNews,
                                                                                      'imgsCarrousel'=>$entitiesIllustration,
                                                                                      'blockPerPage'=>$entitiesBlocks));
    }

   public function traductionAction($lang)
   {
       /*Défini la local en fonction du drapeau choisit dans le header
       * Redirige vers l'index
       */

       $session = $this->getRequest()->getSession();

       // stocke un attribut pour une réutilisation lors d'une future requête utilisateur
       $session->set('lang', $lang);

       // dans un autre contrôleur pour une autre requête
       $foo = $session->get('lang');

       $this->getRequest()->setLocale($foo);

      return $this->indexAction();
   }

   public function getLangId(){

   }
}