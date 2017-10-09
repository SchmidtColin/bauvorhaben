<?php

namespace BauobjektBundle\Controller;

use BauobjektBundle\Entity\Anfrage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Anfrage controller.
 *
 * @Route("anfrage")
 */
class AnfrageController extends Controller
{
    /**
     * Lists users anfrage entities.
     *
     * @Route("/", name="anfrage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $anfrages = $em->getRepository('BauobjektBundle:Anfrage')->findByUser($this->getUser());

        return $this->render('anfrage/index.html.twig', array(
            'anfrages' => $anfrages,
        ));
    }

    /**
     * Lists all anfrage entities.
     *
     * @Route("/admin", name="anfrageAdmin_index")
     * @Method("GET")
     */
    public function indexAdminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $anfrages = $em->getRepository('BauobjektBundle:Anfrage')->findAll($this->getUser());

        return $this->render('anfrage/index.html.twig', array(
            'anfrages' => $anfrages,
        ));
    }

    /**
     * Creates a new anfrage entity.
     *
     * @Route("/new", name="anfrage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $anfrage = new Anfrage();
        $form = $this->createForm('BauobjektBundle\Form\AnfrageType', $anfrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $anfrage->setFkUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($anfrage);
            $em->flush();

            return $this->redirectToRoute('bauobjekt_default_index');
        }

        return $this->render('anfrage/new.html.twig', array(
            'anfrage' => $anfrage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a anfrage entity.
     *
     * @Route("/{id}", name="anfrage_show")
     * @Method("GET")
     */
    public function showAction(Anfrage $anfrage)
    {
        $deleteForm = $this->createDeleteForm($anfrage);

        return $this->render('anfrage/show.html.twig', array(
            'anfrage' => $anfrage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing anfrage entity.
     *
     * @Route("/{id}/edit", name="anfrage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Anfrage $anfrage)
    {
        $deleteForm = $this->createDeleteForm($anfrage);
        $editForm = $this->createForm('BauobjektBundle\Form\AnfrageType', $anfrage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('anfrage_edit', array('id' => $anfrage->getId()));
        }

        return $this->render('anfrage/edit.html.twig', array(
            'anfrage' => $anfrage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a anfrage entity.
     *
     * @Route("/{id}", name="anfrage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Anfrage $anfrage)
    {
        $form = $this->createDeleteForm($anfrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($anfrage);
            $em->flush();
        }

        return $this->redirectToRoute('anfrage_index');
    }

    /**
     * Creates a form to delete a anfrage entity.
     *
     * @param Anfrage $anfrage The anfrage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Anfrage $anfrage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('anfrage_delete', array('id' => $anfrage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
