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
     * Finds and displays a model entity.
     *
     */
    public function showAction(Model $model)
    {
        $deleteForm = $this->createDeleteForm($model);

        return $this->render('model/show.html.twig', array(
            'model' => $model,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing model entity.
     *
     */
    public function editAction(Request $request, Model $model)
    {
        $deleteForm = $this->createDeleteForm($model);
        $editForm = $this->createForm('System\BackendBundle\Form\ModelType', $model);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('model_edit', array('id' => $model->getId()));
        }

        return $this->render('model/edit.html.twig', array(
            'model' => $model,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a model entity.
     *
     */
    public function deleteAction(Request $request, Model $model)
    {
        $form = $this->createDeleteForm($model);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($model);
            $em->flush();
        }

        return $this->redirectToRoute('model_index');
    }

    /**
     * Creates a form to delete a model entity.
     *
     * @param Model $model The model entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Model $model)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('model_delete', array('id' => $model->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
