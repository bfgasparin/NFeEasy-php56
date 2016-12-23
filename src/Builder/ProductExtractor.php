<?php

namespace Bfgasparin\NFeEasy\Builder;

use DOMElement;
use Bfgasparin\NFeEasy\Product;

trait ProductExtractor
{
    protected function extractProducts(DOMElement $element) : array
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
