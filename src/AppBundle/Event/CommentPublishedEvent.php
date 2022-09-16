<?php

namespace AppBundle\Event;

use App\Entity\Subscriber;
use Symfony\Contracts\EventDispatcher\Event; // is this event correct?

// use Symfony\Component\EventDispatcher\Event;

class CommentPublishedEvent extends Event
{
    /**
     * @var Subscriber $_subscriber
     */

    private $_subscriber;

    const NAME = "comment.published";

    public function __construct(Subscriber $subscriber)
    {
        $this->_subscriber = $subscriber;
    }

    public function getSubscriber() {
        return $this->_subscriber;
    }

    // public function getArticle() {
    //     $this->_subscriber->getArticle();
    // }
}
