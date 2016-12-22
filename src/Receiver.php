<?php

namespace Bfgasparin\NFeEasy;

/**
 * Represents an Invoice Emmiter.
 */
class Receiver extends Object
{
    protected $fields = [
        'CNPJ', 'xNome',
        'IE', 'indIEDest',
        'address',
    ];
}
