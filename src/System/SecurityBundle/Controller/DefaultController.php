<?php

namespace System\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SystemSecurityBundle:Default:index.html.twig');
    }
}
