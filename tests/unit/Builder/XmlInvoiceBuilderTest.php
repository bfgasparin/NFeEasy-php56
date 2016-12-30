<?php

use PHPUnit\Framework\TestCase;
use NFeEasy\Builder\XmlInvoiceBuilder;

class XmlInvoiceBuilderTest extends TestCase
{
    use FakeData;

    /** @test */
    public function it_creates_an_invoice_from_xml_string()
    {
        $invoice = XmlInvoiceBuilder::create(
            file_get_contents(__DIR__.'/../../fixtures/invoice.xml')
        );
        $this->assertEquals(
            $this->invoiceAttributes,
            $invoice->toArray()
        );
    }

}
