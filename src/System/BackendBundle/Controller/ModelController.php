<?php

namespace System\BackendBundle\Controller;

use System\BackendBundle\Entity\Model;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Model controller.
 *
 */
class ModelController extends Controller
{
    /**
     * Lists all model entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $models = $em->getRepository('SystemBackendBundle:Model')->findAll();

        return $this->render('model/index.html.twig', array(
            'models' => $models,
        ));
    }

    /**
     * Creates a new model entity.
     *
     */
    public function newAction(Request $request)
    {
        $model = new Model();
        $form = $this->createForm('System\BackendBundle\Form\ModelType', $model);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($model);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Sus datos han sido guardados satisfactoriamente'
            );

            return $this->redirectToRoute('model_index');
        }

        return $this->render('model/new.html.twig', array(
            'model' => $model,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing model entity.
     *
     */
    public function editAction(Request $request, Model $model)
    {
        $editForm = $this->createForm('System\BackendBundle\Form\ModelType', $model);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Sus datos fueron actualizados satisfactoriamente'
            );

            return $this->redirectToRoute('model_index');
        }

        return $this->render('model/edit.html.twig', array(
            'model' => $model,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a model entity.
     *
     */
    public function deleteAction(Request $request, Model $model)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($model);
        $em->flush();

        $this->addFlash(
            'notice',
            'Sus datos fueron eliminados satisfactoriamente'
        );

        return $this->redirectToRoute('model_index');
    }
}
