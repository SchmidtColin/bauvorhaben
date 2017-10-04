<?php

namespace BauobjektBundle\Controller;

use BauobjektBundle\Entity\Anfrage;
use BauobjektBundle\Form\AnfrageType;
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
     * @Route("/anfragen")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function anfrageAction(Request $request)
    {
        $anfrage = new Anfrage();

        $form = $this->createForm( AnfrageType::class, $anfrage);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $anfrage = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($anfrage);
            $em->flush();
        }
        return $this->render('BauobjektBundle:Default:anfrage.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/anfrageBestaetigen")
     */
    public function anfrageBestaetigenAction()
    {
        return $this->render('BauobjektBundle:Default:anfrageBestaetigen.html.twig');
    }

}
