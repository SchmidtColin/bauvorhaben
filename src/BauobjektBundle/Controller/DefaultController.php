<?php

namespace BauobjektBundle\Controller;

use BauobjektBundle\Entity\Bestellung;
use BauobjektBundle\Form\BestellungType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
 * @Route("/")
 */
    public function indexAction()
    {
        return $this->render('BauobjektBundle:Default:index.html.twig');
    }

    /**
     * @Route("/anfrage")
     */
    public function anfrageAction(Request $request)
    {
        $bestellung = new Bestellung();

        $form = $this->createForm( BestellungType::class, $bestellung);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $bestellung = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($bestellung);
            $em->flush();
        }

        return $this->render('BauobjektBundle:Default:anfrage.html.twig', array('form' => $form->createView(),));
    }
}
