<?php

namespace KamilG\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KamilGSiteBundle:Default:index.html.twig');
    }
}
