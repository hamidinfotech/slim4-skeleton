<?php

namespace App\Handler;

use Slim\Error\AbstractErrorRenderer;
use Throwable;

class JsonErrorRenderer extends AbstractErrorRenderer
{
    /**
     * @param Throwable $exception
     * @param bool $displayErrorDetails
     * @return string
     */
    public function __invoke(Throwable $exception, bool $displayErrorDetails): string
    {
        $error = [
            'success' => false,
            'message' => $exception->getMessage(),
            'result' => null
        ];

        return (string)json_encode($error, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}