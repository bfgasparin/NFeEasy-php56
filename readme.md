# NFeEasy

## Introduction

NFeEasy is a wrapper to manage NFe files.

## How to use

You pass the xml nfe file content to the XmlInvoiceBuilder
and it will returns the PHP objects representing the given NFe.

    <?php

    XmlInvoiceBuilder::::create(
        file_get_contents('path/to//my/invoice.xml')
    );
    // returns an instance of Bfgasparin\NFeEasy\Invoice

## Invoice Objects

The main class is the `Bfgasparin\NFeEasy\Invoice`.

The classes contain all identification data for the Nfe and de all details.

The table bellow describes all attributes you can access from
`Bfgasparin\NFeEasy\Invoice` class:

### Invoice

Attribute        | Type                 | Description
---------------- | -------------------- | ------------
`cUF`            | string               |
`cNF`            | string               | Transaction Nature Id
`natOp`          | string               | Transaction Nature Description
`indPag`         | string               | Payment Id (0 = Entrada / 1 = Saída)
`mod`            | string               |
`serie`          | string               | Invoice Serie
`nNF`            | string               | Invoice Number
`dhEmi`          | string               | Emission Date
`tpNF`           | string               | Invoice Type Id
`idDest`         | string               |
`cMunFG`         | string               |
`tpImp`          | string               |
`tpEmis`         | string               |
`cDV`            | string               |
`tpAmb`          | string               |
`finNFe`         | string               |
`indFinal`       | string               |
`indPres`        | string               |
`procEmi`        | string               |
`verProc`        | string               | Version
`products`       | Collection(Product)  | A list of products for the Invoice
`additionalInfo` | string               | Addicional Information
`emitter`        | Emitter              | The Invoice Emitter
`receiver`       | Receiver             | The Invoice Receiver


The table bellow describes all attributes you can access from
`Bfgasparin\NFeEasy\Product` class:

### Product

Attribute        | Type                 | Description
---------------- | -------------------- | ------------
`cProd`          | string               | Product Id
`cEAN`           | string               |
`xProd`          | string               | Product Description
`NCM`            | string               | Payment Id (0 = Entrada / 1 = Saída)
`CEST`           | string               |
`CFOP`           | string               | Invoice Serie
`uCom`           | string               | Invoice Number
`qCom`           | string               | Emission Date
`vUnCom`         | string               | Invoice Type Id
`vProd`          | string               | Product Value
`cEANTrib`       | string               |
`uTrib`          | string               | Unit Type (UN, CX)
`qTrib`          | string               |
`vUnTrib`        | string               | Unit Value
`indTot`         | string               | Total Value (nItemPed*intTotal)
`xPed`           | string               |
`nItemPed`       | string               | Quantity
`nFCI`           | string               |
