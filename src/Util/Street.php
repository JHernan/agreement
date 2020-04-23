<?php

namespace App\Util;

use Symfony\Component\Yaml\Parser;

class Street
{
    public static function getStreets()
    {
        $yaml = new Parser();
        return $yaml->parse(file_get_contents(__DIR__ . '/../../app/config/streets.yml'));
    }
}