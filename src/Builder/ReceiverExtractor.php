<?php

namespace NFeEasy\Builder;

use DOMElement;
use NFeEasy\Address;
use NFeEasy\Receiver;

trait ReceiverExtractor
{
    protected function extractReceiver(DOMElement $element)
    {
        $receiver = Receiver::create(
            $this->extractNodeElementByTagName('dest', $element)
        );

        $receiver->address = Address::create(
            $this->extractNodeElementByTagName('enderDest', $element)
        );

        return $receiver;
    }
}
