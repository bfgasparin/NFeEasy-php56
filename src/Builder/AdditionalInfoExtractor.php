<?php

namespace NFeEasy\Builder;

use DOMElement;

trait AdditionalInfoExtractor
{
    protected function extractAdditionalInfo(DOMElement $element) : string
    {
        return $element->getElementsByTagName('infAdic')[0]
            ->getElementsByTagName('infCpl')[0]
            ->nodeValue
        ;
    }
}
