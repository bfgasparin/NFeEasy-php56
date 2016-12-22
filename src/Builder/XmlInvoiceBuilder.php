<?php

namespace Bfgasparin\NFeEasy\Builder;

use DOMElement;
use Lightools\Xml\XmlLoader;
use Bfgasparin\NFeEasy\Address;
use Bfgasparin\NFeEasy\Emitter;
use Bfgasparin\NFeEasy\Invoice;
use Bfgasparin\NFeEasy\Product;
use Bfgasparin\NFeEasy\Receiver;

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
        $invoice->products = $this->extractProducts($rootNode);

        // Add the Invoice products
        $invoice->additionalInfo = $this->extractAdditionalInfo($rootNode);

        // Add the Emitter and Receiver
        $invoice->emitter = $this->extractEmitter($rootNode);
        $invoice->receiver = $this->extractReceiver($rootNode);

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

    protected function extractAdditionalInfo(DOMElement $element) : string
    {
        return $element->getElementsByTagName('infAdic')[0]
            ->getElementsByTagName('infCpl')[0]
            ->nodeValue
        ;
    }

    protected function extractEmitter(DOMElement $element) : Emitter
    {
        $emitter = Emitter::create(
            $this->extractNodeElement('emit', $element)
        );

        $emitter->address = Address::create(
            $this->extractNodeElement('enderEmit', $element)
        );

        return $emitter;
    }

    protected function extractReceiver(DOMElement $element) : Receiver
    {
        $receiver = Receiver::create(
            $this->extractNodeElement('dest', $element)
        );

        $receiver->address = Address::create(
            $this->extractNodeElement('enderDest', $element)
        );

        return $receiver;
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
