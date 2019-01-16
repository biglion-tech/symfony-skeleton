<?php

namespace App\Application\EventListener;

use App\Application\Exception\FormValidationException;
use App\Application\ResponseFactory;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ExceptionListener
 * @package App\Application\EventListener
 */
class HttpApiExceptionListener
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * ExceptionListener constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param GetResponseForExceptionEvent $event
     * @throws \Exception
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        $errors = [];
        $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;

        if ($event->getRequest() instanceof Request) {
            if ($exception instanceof FormValidationException) {
                $responseCode = Response::HTTP_BAD_REQUEST;
                $errors = $exception->getErrors();

            } elseif ($exception instanceof MethodNotAllowedHttpException) {
                $responseCode = Response::HTTP_METHOD_NOT_ALLOWED;

            } elseif ($exception instanceof NotFoundHttpException) {
                $responseCode = Response::HTTP_NOT_FOUND;
            }
        } else {
            throw $exception;
        }

        $this->logger->error('Api Http exception: ', [
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'message' => $exception->getMessage(),
        ]);

        $response = ResponseFactory::create(
            $event->getRequest(),
            [],
            $responseCode,
            false,
            $exception->getMessage(),
            $errors
        );

        $event->setResponse($response);
    }
}
