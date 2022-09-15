<?php
namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CommentPublishedSubscriber implements EventDispatcherInterface {

    public static function getSubscribedEvents()
     {
        return [
            CommentPublishedEvent::NAME => 'onCommentPublished'
        ];
    }

    public function onCommentPublished() 
    {

    }
}