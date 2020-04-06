<?php

use Selective\Config\Configuration;

if (!function_exists('dd')) {
    function dd($data)
    {
        echo '<pre>';
        print_r($data);
        die;
    }
}

if (!function_exists('dump')) {
    function dump($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }
}

if (!function_exists('env')) {
    function env($key): string
    {
        /** @var Configuration $env */
        static $env;

        if ($key instanceof Configuration) {
            $env = $key;

            return '';
        }

        return $env->getString($key);
    }
}

if (!function_exists('mix')) {
    /**
     * Get the path to a versioned Mix file.
     *
     * @param string $path
     * @param string $manifestDirectory
     * @return string
     *
     * @throws Exception
     */
    function mix($path, $manifestDirectory = '')
    {
        static $manifests = [];

        $path = '/' . ltrim($path, '/');

        $manifestDirectory = $manifestDirectory ? '/' . ltrim($manifestDirectory, '/') : '';

        $manifestPath = env('public') . $manifestDirectory . '/mix-manifest.json';

        if (!isset($manifests[$manifestPath])) {
            if (!file_exists($manifestPath)) {
                throw new Exception('The Mix manifest does not exist.');
            }

            $manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
        }

        $manifest = $manifests[$manifestPath];

        if (!isset($manifest[$path])) {
            throw new Exception("Unable to locate Mix file: {$path}.");
        }

        return $manifest[$path];
    }
}

if (!function_exists('requestTimezone')) {
    function requestTimezone()
    {
        return $_SERVER['HTTP_X_TIMEZONE'] ?? null;
    }
}