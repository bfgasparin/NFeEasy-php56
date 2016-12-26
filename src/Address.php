<?php

namespace NFeEasy;

/**
 * Represents an Address.
 */
class Address extends Object
{
    protected $fields = [
        'xLgr', 'nro', 'xBairro', 'cMun',
        'xMun', 'UF', 'CEP', 'cPais',
        'xPais', 'fone',
    ];
}
