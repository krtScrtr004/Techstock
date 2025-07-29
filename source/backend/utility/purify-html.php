<?php

function purifyHtml(string $html)
{
    $config = HTMLPurifier_Config::createDefault();
    $config->set('Cache.SerializerPath', sys_get_temp_dir()); // Fixes permission warning for serialization caching

    // README: Remove / Modify this (For development only) -------------------------
    $config->set('HTML.AllowedElements', [
        'div',
        'span',
        'p',
        'ul',
        'li',
        'img',
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
        'em',
        'i',
        'strong'
    ]);
    $config->set('HTML.AllowedAttributes', [
        '*.style',
        '*.src',
        '*.height',
        '*.width',
        '*.alt',
        '*.title'
    ]);

    $html = str_replace('\\', '/', $html);
    // -------------------------------------------------------------------
    
    $purifier = new HTMLPurifier($config);
    return $purifier->purify($html);
}
