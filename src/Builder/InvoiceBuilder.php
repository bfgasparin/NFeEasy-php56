<?php

namespace Bfgasparin\NFeEasy\Builder;

use Bfgasparin\NFeEasy\Invoice;

interface InvoiceBuilder
{
    public function build(string $content) : Invoice;
}
