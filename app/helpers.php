<?php

use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;

if (! function_exists('sanitize_html')) {
    function sanitize_html(?string $html): string
    {
        if ($html === null || $html === '') {
            return '';
        }

        $config = (new HtmlSanitizerConfig())
            ->allowSafeElements()
            ->dropAttribute('style', '*')
            ->dropAttribute('on*', '*');

        return (new HtmlSanitizer($config))->sanitize($html);
    }
}
