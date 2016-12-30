<?php

namespace NFeEasy\Builder;

use DOMElement;

trait NodeExtractor
{
    protected function extractNodeElementByTagName($tagName, DOMElement $element)
    {
        return collect($element->getElementsByTagName($tagName)[0]->childNodes)
            ->mapWithKeys(function ($node) {
                return [$node->tagName => $node->nodeValue];
            })
            ->toArray()
        ;
    }

    protected function extractNodeElement(DOMElement $element)
    {
        return collect($element->childNodes)
            ->mapWithKeys(function ($node) {
                return [$node->tagName => $node->nodeValue];
            })
            ->toArray()
        ;
    }
}
