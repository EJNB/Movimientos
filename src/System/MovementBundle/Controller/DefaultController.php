<?php

namespace System\MovementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SystemMovementBundle:Default:index.html.twig');
    }
}
