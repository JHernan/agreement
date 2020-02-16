<?php


namespace App\Twig;

use Romans\Filter\IntToRoman;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class RomanExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('roman', [$this, 'intToRoman']),
        ];
    }

    public function intToRoman($number)
    {
        $filter = new IntToRoman();
        $result = $filter->filter($number);

        return $result;
    }
}