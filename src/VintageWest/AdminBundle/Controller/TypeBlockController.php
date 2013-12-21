<?php

namespace VintageWest\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VintageWest\AdminBundle\Entity\TypeBlock;
use VintageWest\AdminBundle\Form\TypeBlockType;

/**
 * TypeBlock controller.
 *
 * @Route("/typeblock")
 */
class TypeBlockController extends Controller
{

    /**
     * Lists all TypeBlock entities.
     *
     * @Route("/", name="typeblock")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VintageWestAdminBundle:TypeBlock')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TypeBlock entity.
     *
     * @Route("/", name="typeblock_create")
     * @Method("POST")
     * @Template("VintageWestAdminBundle:TypeBlock:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TypeBlock();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typeblock_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a TypeBlock entity.
    *
    * @param TypeBlock $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TypeBlock $entity)
    {
        $form = $this->createForm(new TypeBlockType(), $entity, array(
            'action' => $this->generateUrl('typeblock_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TypeBlock entity.
     *
     * @Route("/new", name="typeblock_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TypeBlock();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TypeBlock entity.
     *
     * @Route("/{id}", name="typeblock_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:TypeBlock')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeBlock entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TypeBlock entity.
     *
     * @Route("/{id}/edit", name="typeblock_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:TypeBlock')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeBlock entity.');
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
    * Creates a form to edit a TypeBlock entity.
    *
    * @param TypeBlock $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TypeBlock $entity)
    {
        $form = $this->createForm(new TypeBlockType(), $entity, array(
            'action' => $this->generateUrl('typeblock_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TypeBlock entity.
     *
     * @Route("/{id}", name="typeblock_update")
     * @Method("PUT")
     * @Template("VintageWestAdminBundle:TypeBlock:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:TypeBlock')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeBlock entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typeblock_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TypeBlock entity.
     *
     * @Route("/{id}", name="typeblock_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VintageWestAdminBundle:TypeBlock')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypeBlock entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typeblock'));
    }

    /**
     * Creates a form to delete a TypeBlock entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeblock_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
