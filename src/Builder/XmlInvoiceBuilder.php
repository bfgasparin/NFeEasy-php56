<?php

namespace Bfgasparin\NFeEasy\Builder;

use Lightools\Xml\XmlLoader;
use Bfgasparin\NFeEasy\Invoice;
use Bfgasparin\NFeEasy\Product;
use DOMElement;

/**
*
*/
class XmlInvoiceBuilder implements InvoiceBuilder
{
    private $loader;

    public function __construct(XmlLoader $loader)
    {
        $this->loader = $loader;
    }

    public function build(string $content) : Invoice
    {
        // Load DOMNodes from XML string
        $rootNode = $this->loadXml($content);

        //Create the invoice instance
        $invoice = Invoice::create(
            $this->extractNodeElement('ide', $rootNode)
        );

        // Add the Invoice products
        foreach ($rootNode->getElementsByTagName('det') as $det) {
            $invoice->products[] = Product::create(
                $this->extractNodeElement('prod', $det)
            );
        };

        return $invoice;
    }

    public static function create(string $content) : Invoice
    {
        $instance = new static(new XmlLoader());

        return $instance->build($content);
    }

    protected function loadXml(string $content) : DOMElement
    {
        return $this->loader->loadXml($content)
            ->getElementsByTagName('NFe')[0]
            ->getElementsByTagName('infNFe')[0]
        ;
    }
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
