<?php

namespace NFeEasy\Builder;

use DOMElement;
use NFeEasy\Address;
use NFeEasy\Emitter;

trait EmitterExtractor
{
    protected function extractEmitter(DOMElement $element)
    {
        $emitter = Emitter::create(
            $this->extractNodeElementByTagName('emit', $element)
        );

        $emitter->address = Address::create(
            $this->extractNodeElementByTagName('enderEmit', $element)
        );

        return $emitter;
    }
}
