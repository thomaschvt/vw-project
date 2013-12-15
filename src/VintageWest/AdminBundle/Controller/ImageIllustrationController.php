<?php

namespace VintageWest\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VintageWest\AdminBundle\Entity\ImageIllustration;
use VintageWest\AdminBundle\Form\ImageIllustrationType;

/**
 * ImageIllustration controller.
 *
 * @Route("/imageillustration")
 */
class ImageIllustrationController extends Controller
{

    /**
     * Lists all ImageIllustration entities.
     *
     * @Route("/", name="imageillustration")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VintageWestAdminBundle:ImageIllustration')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ImageIllustration entity.
     *
     * @Route("/", name="imageillustration_create")
     * @Method("POST")
     * @Template("VintageWestAdminBundle:ImageIllustration:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ImageIllustration();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //upload d'img
            //on définit le dossier ou envoyer les images
            $dir = "img/illustration";

            //on recupère le nom original du fichier
            $nomBase = $form['url']->getData()->getClientOriginalName();
            //on découpe le nom du fichier pr recup l'extension
            $extension=strrchr($nomBase,'.');
            $extension=substr($extension,1) ;
            //on génère le nouveau nom du fichier
            $randNom = rand(0,1000000);
            $dateNom = time();
            $NewNom = 'img_'.$randNom.$dateNom.'.'.$extension;
            //chemin a stocker pour récupère l'image
            $pathImg = 'img/illustration/'.$NewNom;
            //upload de l'image avec son nouveau nom
            $form['url']->getData()->move($dir, $NewNom);

            $entity->setUrl($NewNom);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('imageillustration_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ImageIllustration entity.
    *
    * @param ImageIllustration $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ImageIllustration $entity)
    {
        $form = $this->createForm(new ImageIllustrationType(), $entity, array(
            'action' => $this->generateUrl('imageillustration_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ImageIllustration entity.
     *
     * @Route("/new", name="imageillustration_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ImageIllustration();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ImageIllustration entity.
     *
     * @Route("/{id}", name="imageillustration_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:ImageIllustration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImageIllustration entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ImageIllustration entity.
     *
     * @Route("/{id}/edit", name="imageillustration_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:ImageIllustration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImageIllustration entity.');
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
    * Creates a form to edit a ImageIllustration entity.
    *
    * @param ImageIllustration $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ImageIllustration $entity)
    {
        $form = $this->createForm(new ImageIllustrationType(), $entity, array(
            'action' => $this->generateUrl('imageillustration_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ImageIllustration entity.
     *
     * @Route("/{id}", name="imageillustration_update")
     * @Method("PUT")
     * @Template("VintageWestAdminBundle:ImageIllustration:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:ImageIllustration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImageIllustration entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('imageillustration_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ImageIllustration entity.
     *
     * @Route("/{id}", name="imageillustration_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VintageWestAdminBundle:ImageIllustration')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ImageIllustration entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('imageillustration'));
    }

    /**
     * Creates a form to delete a ImageIllustration entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imageillustration_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
