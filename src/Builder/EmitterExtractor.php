<?php

namespace Bfgasparin\NFeEasy\Builder;

use DOMElement;
use Bfgasparin\NFeEasy\Address;
use Bfgasparin\NFeEasy\Emitter;

trait EmitterExtractor
{
    protected function extractEmitter(DOMElement $element) : Emitter
    {
        $emitter = Emitter::create(
            $this->extractNodeElement('emit', $element)
        );

        $emitter->address = Address::create(
            $this->extractNodeElement('enderEmit', $element)
        );

        return $emitter;
    }
}
