<?php

namespace VintageWest\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VintageWest\AdminBundle\Entity\Car;
use VintageWest\AdminBundle\Form\CarType;


/**
 * Car controller.
 *
 * @Route("/car")
 */
class CarController extends Controller
{

    /**
     * Lists all Car entities.
     *
     * @Route("/", name="car")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $session = new Session();
        $session->start();
        // définit et récupère des attributs de session
        $session->set('name', 'Drak');

        var_dump($session->get('name'));
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VintageWestAdminBundle:Car')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Car entity.
     *
     * @Route("/", name="car_create")
     * @Method("POST")
     * @Template("VintageWestAdminBundle:Car:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Car();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //upload d'img
            //on définit le dossier ou envoyer les images
            $dir = "img/combis";

            //on recupère le nom original du fichier
            $nomBase = $form['imgUrl']->getData()->getClientOriginalName();
            //on découpe le nom du fichier pr recup l'extension
            $extension=strrchr($nomBase,'.');
            $extension=substr($extension,1) ;
            //on génère le nouveau nom du fichier
            $randNom = rand(0,1000000);
            $dateNom = time();
            $NewNom = 'img_'.$randNom.$dateNom.'.'.$extension;
            //chemin a stocker pour récupère l'image
            $pathImg = 'img/combis/'.$NewNom;
            //upload de l'image avec son nouveau nom
            $form['imgUrl']->getData()->move($dir, $NewNom);

            $entity->setImgUrl($NewNom);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('car_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Car entity.
    *
    * @param Car $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Car $entity)
    {
        $form = $this->createForm(new CarType(), $entity, array(
            'action' => $this->generateUrl('car_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Car entity.
     *
     * @Route("/new", name="car_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Car();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Car entity.
     *
     * @Route("/{id}", name="car_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:Car')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Car entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Car entity.
     *
     * @Route("/{id}/edit", name="car_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:Car')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Car entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Car entity.
    *
    * @param Car $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Car $entity)
    {
        $form = $this->createForm(new CarType(), $entity, array(
            'action' => $this->generateUrl('car_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Car entity.
     *
     * @Route("/{id}", name="car_update")
     * @Method("PUT")
     * @Template("VintageWestAdminBundle:Car:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:Car')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Car entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            //upload d'img
            //on définit le dossier ou envoyer les images
            $dir = "img/combis";

            //on recupère le nom original du fichier
            $nomBase = $editForm['imgUrl']->getData()->getClientOriginalName();
            //on découpe le nom du fichier pr recup l'extension
            $extension=strrchr($nomBase,'.');
            $extension=substr($extension,1) ;
            //on génère le nouveau nom du fichier
            $randNom = rand(0,1000000);
            $dateNom = time();
            $NewNom = 'img_'.$randNom.$dateNom.'.'.$extension;
            //chemin a stocker pour récupère l'image
            $pathImg = 'img/combis/'.$NewNom;
            //upload de l'image avec son nouveau nom
            $editForm['imgUrl']->getData()->move($dir, $NewNom);

            $entity->setImgUrl($NewNom);

            $em->persist($entity);

            $em->flush();

            return $this->redirect($this->generateUrl('car_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Car entity.
     *
     * @Route("/{id}", name="car_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VintageWestAdminBundle:Car')->find($id);
            var_dump($entity);
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Car entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('car'));
    }

    /**
     * Creates a form to delete a Car entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('car_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
