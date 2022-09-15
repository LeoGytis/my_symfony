<?php

namespace App\Controller;

use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Subscriber;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class FormController extends AbstractController
{

    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route('/form', name: 'app_form')]
    
    public function index(Request $request): Response
    {
        $subscriber = new Subscriber();

        // $subscriber->setFirstName('Welcome to my first symfony');
        // $subscriber->setComment('Write your comment here');

        $form = $this->createForm(PostType::class, $subscriber, [
            'action' => $this->generateUrl('app_form'),
            // 'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // var_dump($subscriber);

            $em = $this->doctrine->getManager();
            $em->persist($subscriber);
            $em->flush();
        }


        return $this->render('form/index.html.twig', [
            'subsriber_form' => $form->createView()
        ]);
    }
}
