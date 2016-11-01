<?php

namespace KamilG\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use KamilG\SiteBundle\Form\TodoType;
use KamilG\SiteBundle\Entity\Todo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $list = $this->getDoctrine()
            ->getRepository('KamilGSiteBundle:Todo')
            ->findAll();

       return $this->render('KamilGSiteBundle:Default:index.html.twig',
       array('lists' => $list,
            ));
    }

    public function aboutAction()
    {
        return $this->render('KamilGSiteBundle:Default:about.html.twig');
    }

    public function addAction(Request $request)
    {
        $lists = new Todo();
        $form = $this->createForm(TodoType::class, $lists);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $save = $this->getDoctrine()->getManager();
            $save->persist($lists);
            $save->flush();

            $this->addFlash('notice', 'Your todo has been add.');
            return $this->redirectToRoute('kamil_g_site_homepage');
        }

        return $this->render(
            'KamilGSiteBundle:Default:add.html.twig',
            array('form' => $form->createView())
        );

    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $delete = $em->getRepository('KamilGSiteBundle:Todo')->findOneById($id);

        if (!$delete) {
            return new Response("No todolist found for id ".$id);
        }

        $em->remove($delete);
        $em->flush();

        $this->addFlash('notice', 'Your selected todo has been removed');

        return $this->redirectToRoute('kamil_g_site_homepage');

    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $edit = $em->getRepository('KamilGSiteBundle:Todo')->find($id);

        if (!$edit) {
            return new response("ID $id not found in database.");
        }

        $form = $this->createForm(TodoType::class, $edit);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $save = $this->getDoctrine()->getManager();
            $save->flush();

            $this->addFlash('notice', 'Your todo has been edited.');
            return $this->redirectToRoute('kamil_g_site_homepage');
        }

        return $this->render(
            'KamilGSiteBundle:Default:edit.html.twig',
            array('form' => $form->createView())
        );
    }

        public function counterAction()
        {
            return new response (
                count($this->getDoctrine()->getRepository('KamilGSiteBundle:Todo')->findAll())
            );
        }
}
