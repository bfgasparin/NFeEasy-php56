<?php

namespace Bfgasparin\NFeEasy\Builder;

use DOMElement;

trait NodeExtractor
{
    protected function extractNodeElement(string $tagName, DOMElement $element) : array
    {
        return collect($element->getElementsByTagName($tagName)[0]->childNodes)
            ->mapWithKeys(function ($node) {
                return [$node->tagName => $node->nodeValue];
            })
            ->toArray()
        ;
    }
}
