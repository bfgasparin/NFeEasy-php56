<?php

namespace Bfgasparin\NFeEasy;

/**
* Represents an Invoice Item
*/
class Product extends Object
{
    protected $fields = [
        "cProd", "cEAN", "xProd", "NCM", "CEST", "CFOP",
        "uCom", "qCom", "vUnCom", "vProd", "cEANTrib",
        "uTrib", "qTrib", "vUnTrib", "indTot", "xPed",
        "nItemPed", "nFCI"
    ];
}