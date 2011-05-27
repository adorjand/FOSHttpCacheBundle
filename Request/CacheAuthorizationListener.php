<?php

namespace Liip\CacheControlBundle\Request;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;

/**
 * listen to HEAD requests, return response after security, but before Controller is invoked
 *
 * @author Stefan Paschke stefan.paschke@gmail.com
 */
class CacheAuthorizationListener
{
   /**
    * @param GetResponseEvent $event
    */
    public function onCoreRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        if ($request->getMethod() == 'HEAD') {
            // return a 204 "No Content" Response to stop processing
            $response = new Response('', 204);
            $event->setResponse($response);
        }
    }
}
