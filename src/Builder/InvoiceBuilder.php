<?php

namespace Bfgasparin\NFeEasy\Builder;

use Bfgasparin\NFeEasy\Invoice;

interface InvoiceBuilder
{
    const ATTRIBUTES_MAPPING = [
        'cUF' => '',
        'cNF' => '',
        'natOp' => '',
        'indPag' => '',
        'mod' => '',
        'serie' => '',
        'nNF' => '',
        'dhEmi' => '',
        'tpNF' => '',
        'idDest' => '',
        'cMunFG' => '',
        'tpImp' => '',
        'tpEmis' => '',
        'cDV' => '',
        'tpAmb' => '',
        'finNFe' => '',
        'indFinal' => '',
        'indPres' => '',
        'procEmi' => '',
        'verProc' => '',
        'products' => '',
    ];

    public function build(string $content) : Invoice;
}
