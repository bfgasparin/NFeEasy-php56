<?php

use PHPUnit\Framework\TestCase;
use Bfgasparin\NFeEasy\Invoice;

class InvoiceTest extends TestCase
{
    use FakeData;

    /** @test */
    public function it_instanciate()
    {
        $invoice = Invoice::create($this->invoiceAttributes);

        $this->assertInvoice($this->invoiceAttributes, $invoice);
    }

    /** @test */
    public function it_converts_to_array()
    {
        $invoice = Invoice::create($this->invoiceAttributes);
        $this->invoiceAttributes['products'] = [];
        $this->assertEquals(
            $this->invoiceAttributes,
            $invoice->toArray()
        );
    }

    /** @test */
    public function it_converts_to_json()
    {
        $invoice = Invoice::create($this->invoiceAttributes);

        $this->invoiceAttributes['products'] = [];
        $this->assertEquals(
            json_encode($this->invoiceAttributes),
            $invoice->toJson()
        );
    }

    protected function assertInvoice(array $data, Invoice $invoice)
    {
        $this->assertEquals('33', $invoice->cUF);
        $this->assertEquals('75002897', $invoice->cNF);
        $this->assertEquals('Venda mer.adq.rec.ter.op.mer.sujsub.trb.cnd.sub / Venda mer', $invoice->natOp);
        $this->assertEquals('1', $invoice->indPag);
        $this->assertEquals('55', $invoice->mod);
        $this->assertEquals('1', $invoice->serie);
        $this->assertEquals('448', $invoice->nNF);
        $this->assertEquals('2016-10-18T09:43:25-02:00', $invoice->dhEmi);
        $this->assertEquals('1', $invoice->tpNF);
        $this->assertEquals('2', $invoice->idDest);
        $this->assertEquals('3301702', $invoice->cMunFG);
        $this->assertEquals('1', $invoice->tpImp);
        $this->assertEquals('1', $invoice->tpEmis);
        $this->assertEquals('1', $invoice->cDV);
        $this->assertEquals('1', $invoice->tpAmb);
        $this->assertEquals('1', $invoice->finNFe);
        $this->assertEquals('0', $invoice->indFinal);
        $this->assertEquals('9', $invoice->indPres);
        $this->assertEquals('0', $invoice->procEmi);
        $this->assertEquals('SAP GRC NFE 3.10', $invoice->verProc);
    }
}
