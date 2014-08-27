<?php
namespace Nie\SimpleFormBundle\Controller;

use Nie\SimpleFormBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
	public function indexAction(Request $req) 
	{

		$user = new User();
		$form = $this->createFormBuilder($user)
			->add('username', 'text')
			->add('password', 'text')
			->add('address', 'text')
			->add('email', 'text')
			->getForm();
		if ($req->isMethod('POST')) {
			$form->bind($req);
			if ($form->isValid()) {
				$factory = $this->get('security.encoder_factory');
				$encoder = $factory->getEncoder($user);
				$password = $encoder->encodePassword(
		            $user->getPassword(), 
		            $user->getSalt()
		    );
				$user->setPassword($password);
				$em = $this->getDoctrine()->getManager();
				$em->persist($user);
				$em->flush();
				$message = 'You have registered!';
				return $this->render('NieSimpleFormBundle:Register:index.html.twig', array('message' => $message));
			}
		}

		return $this->render('NieSimpleFormBundle:Register:index.html.twig', array('form' => $form->createView()));
	}
}