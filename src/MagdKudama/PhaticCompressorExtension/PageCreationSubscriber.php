<?php

namespace MagdKudama\PhaticCompressorExtension;


use MagdKudama\PhaticBlogExtension\Event\BasePageEvent;
use MagdKudama\PhaticBlogExtension\Event\BasePostEvent;
use MagdKudama\PhaticBlogExtension\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PageCreationSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Events::BEFORE_PAGE_CREATED => ['beforePageCreated', 0],
            Events::BEFORE_POST_CREATED => ['beforePostCreated', 0]
        ];
    }

    public function beforePageCreated(BasePageEvent $event)
    {
        $contentCompressed = $this->compressContent($event->getPage()->getPageContent());
        $event->getPage()->setPageContent($contentCompressed);
    }

    public function beforePostCreated(BasePostEvent $event)
    {
        $contentCompressed = $this->compressContent($event->getPost()->getPageContent());
        $event->getPost()->setPageContent($contentCompressed);
    }

    protected function compressContent($content)
    {
        $regexps = [
            "~>\s+<~" => "><",
            "/\n+/" => "\n"
        ];

        foreach ($regexps as $pattern => $replacement) {
            $content = preg_replace($pattern, $replacement, $content);
        }

        return $content;
    }
}