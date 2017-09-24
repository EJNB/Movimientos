<?php

namespace System\MovementBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use System\MovementBundle\Entity\Movement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use System\MovementBundle\Form\MovementType;

/**
 * Movement controller.
 *
 */
class MovementController extends Controller
{
    /**
     * Lists all movement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $movements = $em->getRepository('SystemMovementBundle:Movement')->findAll();

        return $this->render('movement/index.html.twig', array(
            'movements' => $movements,
        ));
    }

    /**
     * Creates a new movement entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('SystemBackendBundle:Equipment');
        $persons = $em->getRepository('SystemMovementBundle:Person')->findAll();
        $movement = new Movement();
        $form = $this->createForm(MovementType::class, $movement);
        $form->handleRequest($request);
        $equipments = $repository->findBy(array(
            'movement' => null
        ));

        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($request->request->get('equipment_selected') as $clave=>$valor){
                //tomar el id de el movimiento
                //tomar el id del equipo
                $equipment = $repository->find($valor);
                $equipment->setMovement($movement);
                $cant_movement = count($em->getRepository('SystemMovementBundle:Movement')->findAll());
                $movement->setNumber($cant_movement+1);
            }

            $em->persist($movement);
            $em->flush();



            return $this->redirectToRoute('movement_index');
        }

        return $this->render('movement/new.html.twig', array(
            'movement' => $movement,
            'equipments' => $equipments,
            'persons' => $persons,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a movement entity.
     *
     */
    public function showAction(Movement $movement)
    {
        $deleteForm = $this->createDeleteForm($movement);

        return $this->render('movement/show.html.twig', array(
            'movement' => $movement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing movement entity.
     *
     */
    public function editAction(Request $request, Movement $movement)
    {
        $deleteForm = $this->createDeleteForm($movement);
        $editForm = $this->createForm('System\MovementBundle\Form\MovementType', $movement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('movement_edit', array('id' => $movement->getId()));
        }

        return $this->render('movement/edit.html.twig', array(
            'movement' => $movement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a movement entity.
     *
     */
    public function deleteAction(Request $request, Movement $movement)
    {
        $form = $this->createDeleteForm($movement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($movement);
            $em->flush();
        }

        return $this->redirectToRoute('movement_index');
    }

    /**
     * Creates a form to delete a movement entity.
     *
     * @param Movement $movement The movement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Movement $movement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('movement_delete', array('id' => $movement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function findPersonasAction(Request $request){
        if($request->isXmlHttpRequest()){
//            $value = $request->request->get('nombre');
            return new Response('ok');
        }
    }
}
