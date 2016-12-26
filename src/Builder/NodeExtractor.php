<?php

namespace NFeEasy\Builder;

use DOMElement;

trait NodeExtractor
{
    protected function extractNodeElement($tagName, DOMElement $element)
    {
        return collect($element->getElementsByTagName($tagName)[0]->childNodes)
            ->mapWithKeys(function ($node) {
                return [$node->tagName => $node->nodeValue];
            })
            ->toArray()
        ;
    }
}
