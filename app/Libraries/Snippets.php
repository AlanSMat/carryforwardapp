<?php

namespace App\Libraries;

class Snippets implements ViewDecoratorInterface 
{
    public static function(string $html): string 
    {
        $snippets = [
            '{{ adjective }}' => 'daily'
        ];

        return strtr($html, $snippets);
    }
}