<?php

namespace App\Controller;

use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Subscriber;

class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function index(): Response
    {
        $subscriber = new Subscriber();

        // $subscriber->setFirstName('Welcome to my first symfony');
        // $subscriber->setComment('Write your comment here');

        $form = $this->createForm(PostType::class, $subscriber);

        // 

        return $this->render('form/index.html.twig', [
            'subsriber_form' => $form->createView()
        ]);
    }
}
