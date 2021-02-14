<?php

namespace CRA\AdminBundle\Controller;

use CRA\AdminBundle\CRAAdminBundle;


use CRA\AdminBundle\Form\cra;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use CRA\AdminBundle\Entity\Personne;
use CRA\AdminBundle\Entity\Projet;
use CRA\AdminBundle\Entity\cramois;
use CRA\AdminBundle\Entity\projetmois;
use CRA\AdminBundle\Entity\absencemois;
use CRA\AdminBundle\Entity\Historique;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Doctrine\Common\Collections\ArrayCollection;

use CRA\UserBundle\Entity\User;



class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('CRAAdminBundle:Default:index.html.twig');
    }
    /**
     * @Route("/vue/accueil" ,name="accueil")
     */
    public function accueilAction()
    {


        return $this->render("vue/accueil.html.twig");
    }
    /**
     * @Route("/user/accueil" ,name="accueiluser")
     */
    public function accueiluserAction()
    {
        return $this->render("user/accueil.html.twig");
    }
    /**
     * @Route("/user/cra" ,name="cra")
     */
    public function CRAAction()
    {
        return $this->render("user/CRA.html.twig");
    }

    /**
     * @Route("/user/saisie/{mois}" ,name="saisie")
     */
    public function saisieAction(request $request ,$mois)
    {
       // $Historique = new Historique();

     //   $form = $this->createForm('CRA\AdminBundle\Form\saisieType', $Historique);
      //  $form->handleRequest($request);
        //$iduser = dump($request->request->get('form')['iduser']);
        // var_dump($iduser);
        // var_dump($id);
      //  if ($form->isSubmitted() && $form->isValid()) {
      //      $em = $this->getDoctrine()->getManager();
      //      $em->persist($Historique);
      //      $em->flush();
       //     return $this->redirectToRoute('accueiluser', array('ajout' => true));
      //  }
       // return $this->render('user/saisie.html.twig');
           // 'Historique' => $Historique,
          //  'form' => $form->createView(),
        $id = $this->getUser()->getId();

        $em= $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findOneById($id);

        $cramois = new cramois();
        $cramois->setUser($user);
        $cramois->setLibellemois($mois);

        $projetmois = new projetmois();
        $form = $this->createForm('CRA\AdminBundle\Form\ProjetmoisType', $projetmois);
        $form->handleRequest($request);

        $absencemois = new absencemois;
        $formm = $this->createForm('CRA\AdminBundle\Form\absencemoisType', $absencemois);
        $formm->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $projetmois->setCramois($cramois);

            $em = $this->getDoctrine()->getManager();
            $em->persist($cramois);
            $em->persist($projetmois);
            $em->flush();

            return $this->redirectToRoute('saisie', ['mois' => $mois] );
        }

        if ($formm->isSubmitted() && $formm->isValid()) {

            $absencemois->setCramois($cramois);

            $em = $this->getDoctrine()->getManager();
            $em->persist($cramois);
            $em->persist($absencemois);
            $em->flush();

            return $this->redirectToRoute('saisie', ['mois' => $mois] );
        }
        $cramois=$this->getDoctrine()->getRepository("CRAAdminBundle:cramois")->findAll();
        $projetmois=$this->getDoctrine()->getRepository("CRAAdminBundle:projetmois")->findAll();
        $User=$this->getDoctrine()->getRepository("UserBundle:User")->findAll();

        return $this->render('user/saisie.html.twig', array(
            'User'=> $User,
            'mois'=>$mois,
            'projetmois' => $projetmois,
            'absencemois' => $absencemois,
            'cramois' => $cramois,
            'projetmois' => $projetmois,
            'form' => $form->createView(),
            'formm' => $formm->createView(),
        ));
    }

    /**
     * @Route("/vue/Historique", name="Historique")
    */
    public function HistoriqueAction()
    {
        $Historique=$this->getDoctrine()->getRepository("CRAAdminBundle:Historique")->findAll();
        return $this->render("vue/Historiqueadm.html.twig",array ('Historique'=> $Historique));


    }


    /**
     * @Route("/vue/Gereprojet", name="Gereprojet")
     */
    public function GereprojetprojetAction()
    {
        return $this->render("vue/Gereprojet.html.twig");
    }

    /**
     * @Route("/user/Historique", name="Historiqueuser")
     */
    public function HistoriqueuserAction()
    {

        $Historique=$this->getDoctrine()->getRepository("CRAAdminBundle:Historique")->findAll();
        $Projet=$this->getDoctrine()->getRepository("CRAAdminBundle:Projet")->findAll();

        return $this->render("user/Historique.html.twig",array ('Historique'=> $Historique,'Projet'=> $Projet)
        );
    }

    /**
     * @Route("/vue/Historiqueadm", name="Historiqueadm")
     */
    public function HistoriqueadmAction()
    {

        $Historique=$this->getDoctrine()->getRepository("CRAAdminBundle:Historique")->findAll();
        $Projet=$this->getDoctrine()->getRepository("CRAAdminBundle:Projet")->findAll();
        $User=$this->getDoctrine()->getRepository("UserBundle:User")->findAll();

        return $this->render("user/Historiqueadm.html.twig",array
            ('Historique'=> $Historique,'Projet'=> $Projet,'User'=> $User)
        );
    }
    /**
     * @Route("/user/saisieact", name="saisieact")
     */
    public function saisieactAction(request $request)
    {
        $id = $this->getUser()->getId();
       // var_dump($id);
        $em= $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findOneById($id);
       // var_dump($user);
        $Historique = new Historique();
        $Historique->setUser($user);
        $form = $this->createForm('CRA\AdminBundle\Form\HistoriqueType', $Historique);
        $form->handleRequest($request);
        //$iduser = dump($request->request->get('form')['iduser']);
     // var_dump($iduser);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Historique);
            $em->flush();
            return $this->redirectToRoute('accueiluser', array('ajout' => true));
        }
        return $this->render('user/saisieact.html.twig', array(
            'Historique' => $Historique,

            'form' => $form->createView(),

        ));
    }
    /**
     * @Route("/vue/ajouter", name="ajouter")
     */
    public function ajouterAction(request $request )
    {

        $Personne = new Personne();
        $form = $this->createForm('CRA\AdminBundle\Form\PersonneType', $Personne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Personne);
            $em->flush();

            return $this->redirectToRoute('GerePersonne', array('ajout' => true));

        }

        return $this->render('vue/saisie.html.twig', array(
            'personne' => $Personne,
            'form' => $form->createView(),
        ));
    }


    public function alertPAction(request $request)
    {

        $projetmois = new projetmois();
        $form = $this->createForm('CRA\AdminBundle\Form\projetmoisType', $projetmois);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projetmois);
            $em->flush();

            return $this->redirectToRoute('saisie', array('ajout' => true));

        }

        return $this->render('vue/saisie.html.twig', array(
            'projetmois' => $projetmois,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/vue/ajouteprojet", name="ajouteprojet")
     */
    public function ajouteprojetAction(request $request )
    {

        $Projet = new Projet();
        $form = $this->createForm('CRA\AdminBundle\Form\ProjetType', $Projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Projet);
            $em->flush();

            return $this->redirectToRoute('Gereprojet', array('ajout' => true));

        }

        return $this->render('vue/ajouteprojet.html.twig', array(
            'projet' => $Projet,
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/vue/suppPersonne/{id}", name="suppPersonne")
     */
    public function suppPersonneAction(request $request ,$id)
    {
        $p = new Personne();
        $em=$this->getDoctrine()->getManager();
        $p=$em->getRepository('CRAAdminBundle:Personne')->find($id);
        $em->remove($p);
        $em->flush();
        return $this->redirectToRoute('GerePersonne');

    }
    /**
     * @Route("/vue/suppprojet/{id}", name="suppprojet")
     */
    public function suppprojetAction(request $request ,$id)
    {
        $p = new Projet();
        $em=$this->getDoctrine()->getManager();
        $p=$em->getRepository('CRAAdminBundle:Projet')->find($id);
        $em->remove($p);
        $em->flush();
        return $this->redirectToRoute('Gereprojet');

    }

    /**
     * @Route("/vue/editPersonne/{id}", name="editPersonne")
     */
    public function editPersonneAction(request $request ,Personne $personne)
    {
        $editForm = $this->createForm('CRA\AdminBundle\Form\PersonneType', $personne);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('GerePersonne', array('id' => $personne->getId()));
        }

        return $this->render('vue/editPersonne.html.twig', array(
            'personne' => $personne,
            'edit_form' => $editForm->createView(),
        ));
    }


    /**
     * @Route("/vue/Editprojet/{id}", name="Editprojet")
     */
    public function EditprojetAction(request $request ,Projet $projet)
    {
        $editForm = $this->createForm('CRA\AdminBundle\Form\ProjetType', $projet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Gereprojet', array('id' => $projet->getId()));
        }

        return $this->render('vue/Editprojet.html.twig', array(
            'Projet' => $projet,
            'edit_form' => $editForm->createView(),
        ));
    }
    /**
     * @Route("/vue/addform", name="addform")
     */
    public function addfromAction()
    {
        return $this->render("vue/GerePersonne.html.twig");
    }
    /**
     * @Route("/vue/GerePersonne", name="GerePersonne")
     */

    public function GerePersonneAction()
    {
        $User=$this->getDoctrine()->getRepository("UserBundle:User")->findAll();
        return $this->render("vue/GerePersonne.html.twig",array ('User'=> $User));
    }
    /**
     * @Route("/vue/Gereprojet", name="Gereprojet")
     */
    public function GereprojeteAction()
    {
        $Projet=$this->getDoctrine()->getRepository("CRAAdminBundle:Projet")->findAll();
        return $this->render("vue/Gereprojet.html.twig",array ('Projet'=> $Projet));
    }

    /**
     * @Route("/vue/addPersonne/{nom}/{prenom}")
     * @Template()
     */
    public function addPersonneAction($nom,$prenom)
    {
        $p=new Personne();
        $p->setNom($nom);
        $p->setPrenom($prenom);
        $em = $this->getDoctrine()->getManager();
        $em->persist($p);
        $em->flush();
        return array ('Personne'=> $p);
    }
    /**
     * @Route("/vue/listPersonne")
     * @Template()
     */
    public function listPersonneAction()
    {
        $Personne=$this->getDoctrine()->getRepository("CRAAdminBundle:Personne")->findAll();
       // return array ('Personne'=> $Personne);
        return $this->render("vue/listPersonne.html.twig",array ('Personne'=> $Personne));

    }

    /**
     * @Route("/vue/Historique", name="export")
     * @Template()
     */
    public function ExportAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Historiques=$em->getRepository("CRAAdminBundle:Historique")->findAll();

        $writer = $this->container->get('egyg33k.csv.writer');

        $csv = $writer::createFromFileObject(new \SplTempFileObject());

        foreach ($Historiques as $Htq){
          $csv->insertOne([$Htq->getUser(),$Htq->getId(),$Htq->getTypeabsence(),$Htq->getHeurD(),$Htq->getHeurf(),
              $Htq->getDate(),$Htq->getLoctravail(),$Htq->getNomprojet(),$Htq->getNatintervention() ]);
              }
        $csv->output('users.csv');
        die();
    }


}



