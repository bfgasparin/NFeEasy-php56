<?php

// Builder
require(dirname(__FILE__) . '/src/Builder/AdditionalInfoExtractor.php');
require(dirname(__FILE__) . '/src/Builder/EmitterExtractor.php');
require(dirname(__FILE__) . '/src/Builder/NodeExtractor.php');
require(dirname(__FILE__) . '/src/Builder/ProductExtractor.php');
require(dirname(__FILE__) . '/src/Builder/ReceiverExtractor.php');
require(dirname(__FILE__) . '/src/Builder/InvoiceBuilder.php');
// Main Builder
require(dirname(__FILE__) . '/src/Builder/XmlInvoiceBuilder.php');

// Loaders
require(dirname(__FILE__) . '/src/Loader/XmlLoader.php');

// Base Domain Object
require(dirname(__FILE__) . '/src/Object.php');

// Domain Objects
require(dirname(__FILE__) . '/src/Address.php');
require(dirname(__FILE__) . '/src/Emitter.php');
require(dirname(__FILE__) . '/src/Invoice.php');
require(dirname(__FILE__) . '/src/Product.php');
require(dirname(__FILE__) . '/src/Receiver.php');

