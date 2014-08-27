<?php

namespace Nie\SimpleFormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NieSimpleFormBundle:Default:index.html.twig', array('name' => $name));
    }
}
