<?php

namespace Bfgasparin\NFeEasy;

use DOMNode;
use Illuminate\Support\Collection;

/**
* Represents an Eletronic Invoice (NFe)
*/
class Invoice extends Object
{
    protected $fields = [
        "cUF", "cNF", "natOp", "indPag", "mod",
        "serie", "nNF", "dhEmi", "tpNF", "idDest",
        "cMunFG", "tpImp", "tpEmis", "cDV", "tpAmb",
        "finNFe", "indFinal", "indPres", "procEmi",
        "verProc", 'products',
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->attributes['products'] = new Collection();
    }
}