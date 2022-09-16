<?php
namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CommentPublishedSubscriber implements EventSubscriberInterface {

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
        dump($event);
    }
}