<?php

namespace System\BackendBundle\Controller;

use Symfony\Component\Validator\Constraints\DateTime;
use System\BackendBundle\Entity\Equipment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Equipment controller.
 *
 */
class EquipmentController extends Controller
{
    /**
     * Lists all equipment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipment = $em->getRepository('SystemBackendBundle:Equipment')->findBy(array(
            'movement' => null
        ));

        return $this->render('equipment/index.html.twig', array(
            'equipment' => $equipment,
        ));
    }

    /**
     * Creates a new equipment entity.
     *
     */
    public function newAction(Request $request)
    {
        $equipment = new Equipment();
        $form = $this->createForm('System\BackendBundle\Form\EquipmentType', $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $equipment->setCreateAt(new \DateTime('now'));
//            $mark = $request->request->get('system_backendbundle_equipment[]');
            $name_mark = $em->getRepository('SystemBackendBundle:Model')->find($equipment->getModel())->getMark();
//            dump($name_mark->getName());
            $equipment->setDescription($equipment->getType().' '.$name_mark.' '.$equipment->getModel().' '.$equipment->getNi().' '.$equipment->getNs());

            $em->persist($equipment);
            $em->flush();

            $this->addFlash(
                'notice',
                'Sus datos han sido guardados satisfactoriamente'
            );

            return $this->redirectToRoute('equipment_index');
        }

        return $this->render('equipment/new.html.twig', array(
            'equipment' => $equipment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a equipment entity.
     *
     */
    public function showAction(Equipment $equipment)
    {
        return $this->render('equipment/show.html.twig', array(
            'equipment' => $equipment,
        ));
    }

    /**
     * Displays a form to edit an existing equipment entity.
     *
     */
    public function editAction(Request $request, Equipment $equipment)
    {
        $editForm = $this->createForm('System\BackendBundle\Form\EquipmentType', $equipment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Sus datos han sido guardados satisfactoriamente'
            );

            return $this->redirectToRoute('equipment_index');
        }

        return $this->render('equipment/edit.html.twig', array(
            'equipment' => $equipment,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a equipment entity.
     *
     */
    public function deleteAction(Equipment $equipment)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($equipment);
        $em->flush();

        $this->addFlash(
            'notice',
            'Sus datos fueron eliminados satisfactoriamente'
        );

        return $this->redirectToRoute('equipment_index');
    }
}
