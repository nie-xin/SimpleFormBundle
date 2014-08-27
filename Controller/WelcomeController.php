<?php

namespace Nie\SimpleFormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class WelcomeController extends Controller
{
    public function indexAction()
    {
    	$request = $this->getRequest();
	  	$session = $request->getSession();
    			    
      return $this->render('NieSimpleFormBundle:Welcome:index.html.twig');
    }
}