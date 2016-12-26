<?php

namespace NFeEasy\Builder;

use DOMElement;
use NFeEasy\Address;
use NFeEasy\Emitter;

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
