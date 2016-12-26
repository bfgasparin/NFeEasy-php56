<?php

namespace NFeEasy;

/**
 * Represents an Invoice Emmiter.
 */
class Emitter extends Object
{
    protected $fields = [
        'CNPJ', 'xNome', 'xFant',
        'IE', 'IEST', 'CRT',
        'address',
    ];
}
