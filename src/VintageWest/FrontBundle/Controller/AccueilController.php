<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 12/14/13
 * Time: 6:05 PM
 */

namespace VintageWest\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    public function indexAction()
    {

        return $this->render('VintageWestFrontBundle:Accueil:accueil.html.twig');
    }

   public function traductionAction($lang)
   {
       /*Défini la local en fonction du drapeau choisit dans le header
       * Redirige vers l'index
       */
       $request = $this->getRequest();
       $request->setLocale($lang);

       return $this->render('VintageWestFrontBundle:Accueil:accueil.html.twig');
   }

}