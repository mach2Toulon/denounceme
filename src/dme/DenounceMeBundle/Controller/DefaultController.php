<?php

namespace dme\DenounceMeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;

use dme\DenounceMeBundle\Entity\Post;
use dme\DenounceMeBundle\Form\Type\PostType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_welcome")
     * @Template()
     */
    public function indexAction() {
      return $this->render(
        'dmeDenounceMeBundle:Default:index.html.twig',
        array(
          'posts' => $this->getDoctrine()->getRepository('dmeDenounceMeBundle:Post')->findAll()
        )
      );
    }
    
    /**
     * @Route("/create", name="_create")
     * @Template()
     */
    public function createAction() {
      $post = new Post();

      $form = $this->get('form.factory')->create(new PostType(), $post);

      if ('POST' == $this->getRequest()->getMethod()) {
        $form->bindRequest($this->getRequest());
          
        if($form->isValid()) {
          $em = $this->getDoctrine()->getEntityManager();
          $em->persist($post);
          $em->flush();

          $this->get('session')->setFlash('notice', 
            $this->get('translator')->trans('Vous avez rapporté. Comment vous vous sentez ?')
          );
        }
      }
      
      return new RedirectResponse($this->generateUrl('_welcome'));
    }
    
    /**
     * @Route("/denounce", name="_denounce")
     * @Template()
     */
    public function denounceAction() {
      $post = new Post();
      $form = $this->createForm(new PostType(), $post);
      
      return $this->render('dmeDenounceMeBundle:Default:denounce.html.twig', array(
        'form' => $form->createView(),
      ));
    }
}
