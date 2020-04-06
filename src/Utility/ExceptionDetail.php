<?php

namespace App\Utility;

use Throwable;

final class ExceptionDetail
{
    public static function getExceptionText(Throwable $exception, int $maxLength = 0): string
    {
        return self::generate($exception, $maxLength);
    }

    public static function getExceptionTextWithTrace(Throwable $exception, int $maxLength = 0): string
    {
        return self::generate($exception, $maxLength, true);
    }

    private static function generate(Throwable $exception, int $maxLength = 0, bool $trace = false): string
    {
        $code = $exception->getCode();
        $file = $exception->getFile();
        $line = $exception->getLine();
        $message = $exception->getMessage();
        $error = sprintf('[%s] %s in %s on line %s.', $code, $message, $file, $line);

        if ($trace) {
            $trace = $exception->getTraceAsString();
            $error .= sprintf("\nBacktrace:\n%s", $trace);
        }

        if ($maxLength > 0) {
            $error = substr($error, 0, $maxLength);
        }

        return $error;
    }
}
