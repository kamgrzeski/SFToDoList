<?php

namespace KamilG\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ContactController extends Controller
{
    public function indexAction()
    {
        return $this->render('KamilGSiteBundle:Default:contact.html.twig');
    }
}
