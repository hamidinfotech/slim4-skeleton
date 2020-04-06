<?php

namespace App\Handler;

use App\Factory\LoggerFactory;
use App\Utility\ExceptionDetail;
use Psr\Http\Message\ResponseFactoryInterface;
use \Slim\Handlers\ErrorHandler as SlimErrorHandler;
use Slim\Interfaces\CallableResolverInterface;

class ErrorHandler extends SlimErrorHandler
{
    private $logger;

    public function __construct(CallableResolverInterface $callableResolver, ResponseFactoryInterface $responseFactory, LoggerFactory $loggerFactory)
    {
        parent::__construct($callableResolver, $responseFactory);
        $this->logger = $loggerFactory
            ->addFileHandler('app.log')
            ->createInstance('app');
    }

    protected function logError(string $error): void
    {
        $detailedErrorMessage = ExceptionDetail::getExceptionText($this->exception);
        $this->logger->error($detailedErrorMessage);
    }

}