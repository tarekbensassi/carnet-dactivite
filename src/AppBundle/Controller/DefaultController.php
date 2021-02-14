<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityManager;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/tarek")
     */
    public function showAction()
    {
        return new response('reponse');
    }

    /**
     * @Route("/add/{nom}/{prenom}")
     * @Template()
     */
    public function addAction($nom,$prenom)
    {
        $p=new Produit();
        $p->setName($nom);
        $p->setPrenom($prenom);
        $em = $this->getDoctrine()->getManager();
        $em->getPersist($p);
        $em->getflash();
        return array ('produit'=> $p);
    }
}
