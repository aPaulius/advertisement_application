<?php

namespace Mediapark\AdvertisementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Mediapark\AdvertisementBundle\Entity\Advertisement;
use Mediapark\AdvertisementBundle\Entity\User;
use Mediapark\AdvertisementBundle\Form\Type\AdvertisementType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('MediaparkAdvertisementBundle:Advertisement');

        $advertisements = $repository->findAllDesc();

        return $this->render('index/index.html.twig', array(
            'advertisements' => $advertisements,
        ));
    }

    /**
     * @Route("/post_advertisement", name="post_advertisement")
     */
    public function postAdvertisementAction(Request $request) {
        // create a task and give it some dummy data for this example
        $advertisement = new Advertisement();
        $advertisement->setPostingDate(new \DateTime("now"));

        $advertisement->setUser($this->getUser());

        $form = $this->createForm(AdvertisementType::class, $advertisement);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($advertisement);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('form/advertisement.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/user_advertisements", name="user_advertisements")
     */
    public function userAdvertisementsAction() {
        $em = $this->getDoctrine()->getManager();
        $advertisements = $em->getRepository('MediaparkAdvertisementBundle:Advertisement')
        ->findUserAdvertisements($this->getUser());

        return $this->render('advertisement/advertisements.html.twig', array(
            'advertisements' => $advertisements,
        ));
    }
}
