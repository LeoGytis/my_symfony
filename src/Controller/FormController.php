<?php

namespace App\Controller;

use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Subscriber;
use AppBundle\Event\CommentPublishedEvent;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\EventDispatcher\EventDispatcher;

class FormController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route('/form', name: 'app_form')]
    
    public function index(Request $request, EventDispatcherInterface $dispatcher): Response
    {
        $subscriber = new Subscriber();

        // $em = $this->doctrine->getManager();
        // $subscriber = $em->getRepository(Post::class)->findOneBy([
        //     'id' => 4
        // ]);

        $form = $this->createForm(PostType::class, $subscriber, [
            'action' => $this->generateUrl('app_form'),
            // 'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // var_dump($subscriber);

            // ----- Saving to the database -----
            $em = $this->doctrine->getManager();
            $em->persist($subscriber);
            $em->flush();


            // ----- Event -----
            $event = new CommentPublishedEvent($subscriber);

            $dispatcher->dispatch(eventName CommentPublishedEvent::NAME, $event);
        }


        return $this->render('form/index.html.twig', [
            'subsriber_form' => $form->createView()
        ]);
    }
}
