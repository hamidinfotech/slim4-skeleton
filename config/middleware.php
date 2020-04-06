<?php

use App\Factory\LoggerFactory;
use App\Handler\ErrorHandler;
use App\Handler\HtmlErrorRenderer;
use App\Handler\JsonErrorRenderer;
use App\Middleware\TrailingSlashMiddleware;
use Selective\Config\Configuration;
use Slim\App;

return function (App $app) {
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    // Add global middleware to app
    $app->addRoutingMiddleware();

    $app->add(TrailingSlashMiddleware::class);

    $container = $app->getContainer();

    // Error handler
    $settings = $container->get(Configuration::class)->getArray('error_handler_middleware');
    $displayErrorDetails = (bool)$settings['display_error_details'];
    $logErrors = (bool)$settings['log_errors'];
    $logErrorDetails = (bool)$settings['log_error_details'];

    $errorHandler = new ErrorHandler($app->getCallableResolver(), $app->getResponseFactory(), $container->get(LoggerFactory::class));
    $errorHandler->registerErrorRenderer('text/html', HtmlErrorRenderer::class);
    $errorHandler->registerErrorRenderer('application/json', JsonErrorRenderer::class);

    $errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, $logErrors, $logErrorDetails);
    $errorMiddleware->setDefaultErrorHandler($errorHandler);
};