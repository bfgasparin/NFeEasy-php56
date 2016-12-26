<?php

namespace NFeEasy\Builder;

use DOMElement;
use Lightools\Xml\XmlLoader;
use NFeEasy\Emitter;
use NFeEasy\Invoice;
use NFeEasy\Receiver;

class XmlInvoiceBuilder implements InvoiceBuilder
{
    use AdditionalInfoExtractor, EmitterExtractor,
        NodeExtractor, ProductExtractor, ReceiverExtractor
    ;

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

        // Add the Additional Information
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
}
