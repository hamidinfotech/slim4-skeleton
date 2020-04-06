<?php

namespace App\Handler;

use Slim\Error\Renderers\HtmlErrorRenderer as SlimHtmlErrorRenderer;

class HtmlErrorRenderer extends SlimHtmlErrorRenderer
{
    protected $defaultErrorTitle = 'Application Error';

    /**
     * @param string $title
     * @param string $html
     * @return string
     */
    public function renderHtmlBody(string $title = '', string $html = ''): string
    {
        return sprintf(
            '<html>' .
            '   <head>' .
            '       <link rel="shortcut icon" href="/images/favicon/favicon.ico">' .
            "       <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>" .
            '       <title>%s</title>' .
            '       <style>' .
            '           body{margin:0;padding:30px;font:12px/1.5 Helvetica,Arial,Verdana,sans-serif}' .
            '           h1{margin:0;font-size:48px;font-weight:normal;line-height:48px}' .
            '           strong{display:inline-block;width:65px}' .
            '       </style>' .
            '   </head>' .
            '   <body>' .
            '       <img src="/images/logo.svg">' .
            '       <br/>' .
            '       <br/>' .
            '       <h1>%s</h1>' .
            '       <div>%s</div>' .
            '       <a href="#" onClick="window.history.go(-1)">Go Back</a>' .
            '   </body>' .
            '</html>',
            $title,
            $title,
            $html
        );
    }
}