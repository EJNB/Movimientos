<?php

namespace System\BackendBundle\Controller;

use System\BackendBundle\Entity\Mark;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Mark controller.
 *
 */
class MarkController extends Controller
{
    /**
     * Lists all mark entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $marks = $em->getRepository('SystemBackendBundle:Mark')->findAll();

        return $this->render('mark/index.html.twig', array(
            'marks' => $marks,
        ));
    }

    /**
     * Creates a new mark entity.
     *
     */
    public function newAction(Request $request)
    {
        $mark = new Mark();
        $form = $this->createForm('System\BackendBundle\Form\MarkType', $mark);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mark);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Sus datos han sido guardados satisfactoriamente'
            );

            return $this->redirectToRoute('mark_index');
        }

        return $this->render('mark/new.html.twig', array(
            'mark' => $mark,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mark entity.
     *
     */
    public function editAction(Request $request, Mark $mark)
    {
        $editForm = $this->createForm('System\BackendBundle\Form\MarkType', $mark);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Sus datos han sido actualizados satisfactoriamente'
            );

            return $this->redirectToRoute('mark_index');
        }

        return $this->render('mark/edit.html.twig', array(
            'mark' => $mark,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a mark entity.
     *
     */
    public function deleteAction(Mark $mark)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($mark);
        $em->flush();
        $this->addFlash(
            'notice',
            'Sus datos fueron eliminados correctamente'
        );
        return $this->redirectToRoute('mark_index');
    }

    /*
     * Busca todas las marcas
     */
    public function findAllMarcasAction(){
        $em = $this->getDoctrine()->getManager();
        $marks = $em->getRepository('SystemBackendBundle:Mark')->findAll();
        return $this->render('include/maks.html.twig',array(
            'marks' => $marks,
        ));
    }
}
