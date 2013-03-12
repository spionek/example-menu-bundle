<?php

namespace Spionek\ExampleMenuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Default controller.
 *
 * @Route("/")
 */
class DefaultController extends Controller
{
   /**
    * @Route("/{slug}", name="_menu_show")
    * @Template()
    */
    public function showMenuAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SpionekExampleMenuBundle:Menu')->findOneBySlug($slug);
        if (!$entity) {
            $this->createNotFoundException('Not found menu');
        }
        return array('entity' => $entity);
    }
}
