<?php

namespace VintageWest\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use VintageWest\AdminBundle\Entity\Prestation;
use VintageWest\AdminBundle\Form\PrestationType;

/**
 * Prestation controller.
 *
 * @Route("/prestation")
 */
class PrestationController extends Controller
{

    /**
     * Lists all Prestation entities.
     *
     * @Route("/", name="prestation")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VintageWestAdminBundle:Prestation')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Prestation entity.
     *
     * @Route("/", name="prestation_create")
     * @Method("POST")
     * @Template("VintageWestAdminBundle:Prestation:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Prestation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prestations_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Prestation entity.
    *
    * @param Prestation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Prestation $entity)
    {
        $form = $this->createForm(new PrestationType(), $entity, array(
            'action' => $this->generateUrl('prestations_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Prestation entity.
     *
     * @Route("/new", name="prestation_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Prestation();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Prestation entity.
     *
     * @Route("/{id}", name="prestation_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:Prestation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prestation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Prestation entity.
     *
     * @Route("/{id}/edit", name="prestation_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:Prestation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prestation entity.');
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
    * Creates a form to edit a Prestation entity.
    *
    * @param Prestation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Prestation $entity)
    {
        $form = $this->createForm(new PrestationType(), $entity, array(
            'action' => $this->generateUrl('prestations_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Prestation entity.
     *
     * @Route("/{id}", name="prestation_update")
     * @Method("PUT")
     * @Template("VintageWestAdminBundle:Prestation:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VintageWestAdminBundle:Prestation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prestation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('prestations_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Prestation entity.
     *
     * @Route("/{id}", name="prestation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VintageWestAdminBundle:Prestation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Prestation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prestations'));
    }

    /**
     * Creates a form to delete a Prestation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prestations_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
