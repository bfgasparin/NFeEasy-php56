<?php

namespace NFeEasy\Builder;

use DOMElement;
use NFeEasy\Address;
use NFeEasy\Receiver;

trait ReceiverExtractor
{
    protected function extractReceiver(DOMElement $element) : Receiver
    {
        $receiver = Receiver::create(
            $this->extractNodeElement('dest', $element)
        );

        $receiver->address = Address::create(
            $this->extractNodeElement('enderDest', $element)
        );

        return $receiver;
    }
}
