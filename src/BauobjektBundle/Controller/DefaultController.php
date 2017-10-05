<?php

namespace BauobjektBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DefaultController extends Controller
{
    /**
 * @Route("/")
 */
    public function indexAction()
    {
        $user = $this->getUser();
        return $this->render('BauobjektBundle:Default:index.html.twig', array(
            'user' => $user
        ));
    }
}
