<?php

namespace App\Util;

use Symfony\Component\Yaml\Parser;

class Nationality
{
    public static function getNationalities()
    {
        $yaml = new Parser();
        return $yaml->parse(file_get_contents(__DIR__ . '/../../app/config/nationalities.yml'));
    }
}