<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use App\Entity\Subscriber;
use App\Form\SubscriberFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Response;

class SubscriberController extends AbstractController 
{
    /**
     * @Route("/show")
     */

     public function show(Environment $twig) {
        $subscriber = new Subscriber();

        $form = $this->createForm(SubscriberFormType::class, $subscriber);

        return new Response($twig->render('@subscriber/show.thml.twig', [
        // return new Response($twig->render('form/index.thml.twig', [
            'subscriber_form' => $form->createView()
        ]));
     }
}