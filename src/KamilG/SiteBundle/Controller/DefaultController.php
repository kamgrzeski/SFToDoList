<?php

namespace KamilG\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


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
}
