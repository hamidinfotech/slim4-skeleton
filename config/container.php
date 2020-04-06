<?php

use App\Factory\LoggerFactory;
use Psr\Container\ContainerInterface;
use Selective\Config\Configuration;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use App\Repository\Connection;

return [
    Configuration::class => function () {
        return new Configuration(require __DIR__ . '/settings.php');
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);
        $app = AppFactory::create();

        // Optional: Set the base path to run the app in a sub-directory
        // The public directory must not be part of the base path
        //$app->setBasePath('/slim4-app');

        // Set env
        env($container->get(Configuration::class));

        return $app;
    },

    PhpRenderer::class => function (ContainerInterface $container) {
        $config = $container->get(Configuration::class);

        $phpRenderer = new PhpRenderer($config->getString('view.path'));

        $phpRenderer->setLayout($config->getString('view.layout'));

        return $phpRenderer;
    },

    LoggerFactory::class => function (ContainerInterface $container) {
        return new LoggerFactory($container->get(Configuration::class)->getArray('logger'));
    },

    Connection::class => function (ContainerInterface $container) {
        $config = $container->get(Configuration::class);

        return new Connection($config->getArray('db'));
    },
];