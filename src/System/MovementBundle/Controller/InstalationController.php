<?php

namespace System\MovementBundle\Controller;

use System\MovementBundle\Entity\Instalation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Instalation controller.
 *
 */
class InstalationController extends Controller
{
    /**
     * Lists all instalation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $instalations = $em->getRepository('SystemMovementBundle:Instalation')->findAll();

        return $this->render('instalation/index.html.twig', array(
            'instalations' => $instalations,
        ));
    }

    /**
     * Creates a new instalation entity.
     *
     */
    public function newAction(Request $request)
    {
        $instalation = new Instalation();
        $form = $this->createForm('System\MovementBundle\Form\InstalationType', $instalation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($instalation);
            $em->flush();

            return $this->redirectToRoute('instalation_show', array('id' => $instalation->getId()));
        }

        return $this->render('instalation/new.html.twig', array(
            'instalation' => $instalation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a instalation entity.
     *
     */
    public function showAction(Instalation $instalation)
    {
        $deleteForm = $this->createDeleteForm($instalation);

        return $this->render('instalation/show.html.twig', array(
            'instalation' => $instalation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing instalation entity.
     *
     */
    public function editAction(Request $request, Instalation $instalation)
    {
        $deleteForm = $this->createDeleteForm($instalation);
        $editForm = $this->createForm('System\MovementBundle\Form\InstalationType', $instalation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('instalation_edit', array('id' => $instalation->getId()));
        }

        return $this->render('instalation/edit.html.twig', array(
            'instalation' => $instalation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a instalation entity.
     *
     */
    public function deleteAction(Request $request, Instalation $instalation)
    {
        $form = $this->createDeleteForm($instalation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($instalation);
            $em->flush();
        }

        return $this->redirectToRoute('instalation_index');
    }

    /**
     * Creates a form to delete a instalation entity.
     *
     * @param Instalation $instalation The instalation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Instalation $instalation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('instalation_delete', array('id' => $instalation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
