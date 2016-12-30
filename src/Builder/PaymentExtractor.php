<?php

namespace NFeEasy\Builder;

use DOMElement;
use NFeEasy\Payment;

trait PaymentExtractor
{
    protected function extractPayments(DOMElement $element)
    {
		$payments = [];
		foreach ($element->getElementsByTagName('cobr')[0]->childNodes as $payment) {
            $payments[] = Payment::create(
                $this->extractNodeElement($payment)
            );
        }

        return $payments;
    }
}
