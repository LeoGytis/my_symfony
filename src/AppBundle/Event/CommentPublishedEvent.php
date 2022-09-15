<?php

namespace AppBundle\Event;

use App\Entity\Subscriber;
use Symfony\Contracts\EventDispatcher\Event;  /// AR CIA TAS EVENT?

// use Symfony\Component\EventDispatcher\EventDispatcher as E;

class CommentPublishedEvent extends Event
{
    private $_subscriber;

    const NAME = "comment.published";

    public function __construct(Subscriber $subscriber)
    {
        $this->_subscriber = $subscriber;
    }

}
