<?php

namespace Bfgasparin\NFeEasy;
/**
* Represents an Invoice Item
*/
class Tax extends Object
{
    protected $fields = [
        "nome",
        "baseCalculo",
        "modBaseCalculo",
        "valor",
        "porcentagem"
    ];

    public function __construct(DOMNode $node)
    {
        $this->attributes['nome'] = $node->tagName;
        $this->attributes['modBaseCalculo'] = $node->getElementsByTagName('modBC')[0]->nodeValue;
        $this->attributes['baseCalculo'] = $node->getElementsByTagName('vBC')[0]->nodeValue;
        $this->attributes['baseCalculo'] = $node->getElementsByTagName('v'.$node->tagName)[0]->nodeValue;
        $this->attributes['baseCalculo'] = $node->getElementsByTagName('p'.$node->tagName)[0]->nodeValue;
    }
}