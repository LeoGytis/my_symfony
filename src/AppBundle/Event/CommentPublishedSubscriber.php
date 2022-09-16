<?php
namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CommentPublishedSubscriber implements EventSubscriberInterface {

    /** 
     * @var \Swift_mailer $mailer
     */
    private $_mailer;

    public static function getSubscribedEvents()
     {
        return [
            CommentPublishedEvent::NAME => 'onCommentPublished'
                // ['onCommentPublished' => 1000],  // based on the rating this one is going to start first
                // ['onCommentPublished1' => 500],
        ];
    }
    
    public function onCommentPublished(CommentPublishedEvent $event) 
    {
        //send an email to the subscriber
        var_dump('Comment Publsihed Event is working');

        dump($event);

        $event->stopPropagation();  //is not going to continue any more listeners after this one
    }

    // $email = (new Email())
    //          ->from('support@example.com')
    //          ->to('leogytis@gmail.com')
    //          ->subject('Welcome')
    //          ->text('Sveikas tau pavyko');

    // $mailer = new Mailer();

    // $mailer->send($email);

}