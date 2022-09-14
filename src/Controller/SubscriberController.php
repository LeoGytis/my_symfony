<?php

namespace App\Controller;

use App\Entity\Subscriber;
use App\Form\SubscriberFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Response;
use Twig\Environment;

class SubsriberController extends AbstractController 
{
     public function show(Environment $twig) {
        $subscriber = new Subscriber();

        $form = $this->createForm(SubsriberFromType::class, $subscriber);

        return new Response($twig->render('subscriber/show.thml.twig', [
            'subsriber_form' => $form->createView();
        ]));
     }
}