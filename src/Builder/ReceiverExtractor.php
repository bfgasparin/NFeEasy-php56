<?php

namespace Bfgasparin\NFeEasy\Builder;

use DOMElement;
use Bfgasparin\NFeEasy\Address;
use Bfgasparin\NFeEasy\Receiver;

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
