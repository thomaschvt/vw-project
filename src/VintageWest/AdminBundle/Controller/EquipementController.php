<?php

namespace VintageWest\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VintageWest\AdminBundle\Entity\Equipement;
use VintageWest\AdminBundle\Form\EquipementType;

/**
 * Equipement controller.
 *
 * @Route("/equipement")
 */
class EquipementController extends Controller
{

    /**
     * Lists all Equipement entities.
     *
     * @Route("/", name="equipement")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VintageWestAdminBundle:Equipement')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Equipement entity.
     *
     * @Route("/", name="equipement_create")
     * @Method("POST")
     * @Template("VintageWestAdminBundle:Equipement:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Equipement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('equipement_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Equipement entity.
    *
    * @param Equipement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Equipement $entity)
    {
        $form = $this->createForm(new EquipementType(), $entity, array(
            'action' => $this->generateUrl('equipement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Equipement entity.
     *
     * @Route("/new", name="equipement_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Equipement();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Equipement entity.
     *
     * @Route("/{id}", name="equipement_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:Equipement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equipement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Equipement entity.
     *
     * @Route("/{id}/edit", name="equipement_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:Equipement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equipement entity.');
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
    * Creates a form to edit a Equipement entity.
    *
    * @param Equipement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Equipement $entity)
    {
        $form = $this->createForm(new EquipementType(), $entity, array(
            'action' => $this->generateUrl('equipement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Equipement entity.
     *
     * @Route("/{id}", name="equipement_update")
     * @Method("PUT")
     * @Template("VintageWestAdminBundle:Equipement:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:Equipement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equipement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('equipement_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Equipement entity.
     *
     * @Route("/{id}", name="equipement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VintageWestAdminBundle:Equipement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Equipement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('equipement'));
    }

    /**
     * Creates a form to delete a Equipement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('equipement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
