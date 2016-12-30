<?php

namespace NFeEasy;

use Illuminate\Support\Collection;

/**
 * Represents an Eletronic Invoice (NFe).
 */
class Invoice extends Object
{
    protected $fields = [
        'cUF', 'cNF', 'natOp', 'indPag', 'mod',
        'serie', 'nNF', 'dhEmi', 'tpNF', 'idDest',
        'cMunFG', 'tpImp', 'tpEmis', 'cDV', 'tpAmb',
        'finNFe', 'indFinal', 'indPres', 'procEmi',
        'verProc', 'products', 'payments', 'additionalInfo',
        'emitter', 'receiver',
    ];

    protected $collections = [
        'products',
		'payments',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->attributes['products'] = new Collection();
        $this->attributes['payments'] = new Collection();
    }
}
