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
        array('lists' => $list
        ));
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

            return $this->redirectToRoute('kamil_g_site_sucess');
        }

        return $this->render(
            'KamilGSiteBundle:Default:add.html.twig',
            array('form' => $form->createView())
        );
    }

    public function sucessAction()
    {
        return new Response("Sucess!");
    }
}
