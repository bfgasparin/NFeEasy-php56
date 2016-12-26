<?php

namespace NFeEasy\Builder;

use DOMElement;
use NFeEasy\Product;

trait ProductExtractor
{
    protected function extractProducts(DOMElement $element)
    {
        $products = [];
        foreach ($element->getElementsByTagName('det') as $det) {
            $products[] = Product::create(
                $this->extractNodeElement('prod', $det)
            );
        }

        return $products;
    }
}
