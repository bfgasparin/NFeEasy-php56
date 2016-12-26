# NFeEasy

## Introduction

NFeEasy is a wrapper to manage NFe files.

## Requirements

* PHP 7.0.13 or later

## Instalation

### Composer

You and install via composer:

    $ composer require bfgasparin/nfeasy

and use composer autoload:

    require_once('vendor/autoload.php');

### Manual Instalation

If you don't want to use Composer, download the latest version of NefEasy and include the `init.php` file:

    require_once('/path/to/nfeasy/init.php');

You will also need to dowload the NfeEasy php dependencies and autoload then 
manually. See `composer.json` to see NfeEasy dependencies. 

## How to use

To use the NfeEasy, just pass the xml nfe file content to the XmlInvoiceBuilder
and it will returns the PHP objects representing the given NFe.

    <?php

    XmlInvoiceBuilder::::create(
        file_get_contents('path/to//my/invoice.xml')
    );
    // returns an instance of NFeEasy\Invoice

## Domain Objects

Each Domain from NFe is represented by a object class into NFeEasy.

The list of Domains;
    - `NFeEasy\Builder\Invoice`
    - `NFeEasy\Builder\Product`
    - `NFeEasy\Builder\Emitter`
    - `NFeEasy\Builder\Receiver`
    - `NFeEasy\Builder\Address`

The full `NFe` is represented by a relation of one or more domain objects.
For a full NfeEasy reprentation from a NFe file, use the
`NFeEasy\Builder\XmlInvoiceBuilder`

The main domain object is the `NFeEasy\Invoice`.

The classes contain all identification data for the Nfe and related domain objects.

The table bellow describes all attributes you can access from
`NFeEasy\Invoice` class:

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


### Product

`NFeEasy\Product` represents a product into the Invoice.
It contains informations like the name of the product, the NCM, the value, the quantity the taxes, and other product related things.

The table bellow describes all attributes you can access from
`NFeEasy\Product` class:


Attribute        | Type                 | Description
---------------- | -------------------- | ------------
`cProd`          | string               | Product Id
`cEAN`           | string               |
`xProd`          | string               | Product Description
`NCM`            | string               | Nomenclatura Comum do Mercosul / Sistema Harmonizado
`CEST`           | string               |
`CFOP`           | string               | Codigo Fiscal de Operações e Prestações
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

## Emitter

`NFeEasy\Emitter` represents the NFe emitter

The table bellow describes all attributes you can access from
`NFeEasy\Product` class:

Attribute        | Type                 | Description
---------------- | -------------------- | ------------
`CNPJ`           | string               | The CNPJ
`xNome`          | string               | The Emitter name
`xFant`          | string               | Trading name
`IE`             | string               |
`IEST`           | string               |
`CRT`            | string               |
`address`        | Address              | The Emitter Address

## Receiver

`NFeEasy\Receiver` represents the NFe Receiver

The table bellow describes all attributes you can access from
`NFeEasy\Product` class:

Attribute        | Type                 | Description
---------------- | -------------------- | ------------
`CNPJ`           | string               | The CNPJ
`xNome`          | string               | The Receiver name
`IE`             | string               |
`indIEDest`      | string               |
`address`        | Address              | The Receiver Address


## Address

`NFeEasy\Address` represents an address object

The table bellow describes all attributes you can access from
`NFeEasy\Address` class:

Attribute        | Type                 | Description
---------------- | -------------------- | ------------
`xLgr`           | string               | The Street name
`nro`            | string               | the Street number
`xBairro`        | string               | The Neighborhood name
`cMun`           | string               | The District Code
`xMun`           | string               | The Destrict name
`UF`             | string               | The District
`CEP`            | string               | The CEP
`cPais`          | string               | The Country Code
`xPais`          | string               | The Country Name
`fone`           | string               | The phone number


## Creating Domain Objects

You can create Domain Object classes individually. Just use 
the method `created` from the respective object
passing the parameters you wnat to populate into the object:

```php
$address = Address::create([
    'xLgr' => 'Some address street',
    'nro' => '207'
]); // returns an NFeEasy\Address
```

If you dont't want to create the domain objects individually, you can 
pass all data directy to the `NfeEasy\Invoice`:
```
$invoice = Invoice::create([
    'cUF' => '32',
    'natOp' => 'Venda Sub / Venda Mer',
    'addicionalInfo' => 'Some Info',
    // ...
    'emitter' => [
        'xNome' => 'Emitter Name',
        'CNPJ' => '23740049120232'
        // ...
    ],
    'receiver' => [
        'xNome' => 'Receiver Name',
        'CNPJ' => '40193549120112'
        // ...
    ],
    'products' => [
        [
            'cProd' => '13'
            'xProd' => 'Shampoo'
            // ...
        ],
        [
            'cProd' => '345'
            'xProd' => 'Soap'
            // ...
        ],
        // ...
    ]
]); // returns an NFeEasy\Invoice
```

## Attributes

After a Domain Object is created, you can access its date by access the attributes by its names:

```php
$product = Product::create([
    'cProd' => '12'
    'xProd' => 'Notebook'
]);

echo $product->xProd; // prints 'Shampoo'
```

You can access child objects by the attributes names too:

```php
$emitter = Emitter::create([
    'xNome' => 'Andrew'
    'CNPJ' => '23740049120232',
    'address' => [
        'xLgr' => 'Rua Ivaí',
        'nro' => 207,
        'xBairro' => 'Tatuapé'
    ],
]);

$emitter->address;  // returns an instance of NfeEasy\Address;

echo $emitter->address->xBairro; prints 'Tatuapé'
```

## Collections

Array of Domain Objects are treated as Collections into NfeEasy. All Object Collections are represented by an instance of `Illuminate\Support\Collection`.

Collections in NfeEasy are used for:

    * `products` attribute into `Invoice` Object 

For example, to return the collection of products from an Invoice, use:

    $products $invoice->products;  // Return an instance of `Illuminate\Support\Collection`.

To filter products with value greater than 20, use:

    $products = $invoice->products->filter(function ($product, $key){
        return $product->vProd > 20;
    });

For all `Illuminate\Support\Collection` available methods, see [Illuminate Collection Docs](https://laravel.com/docs/5.3/collections#method-filter).

## Serialization

All Domain objects implements `Illuminate\Contracts\Support\Arrayable` and `Illuminate\Contracts\Support\Arrayable\Jsonable`.

So you can transform the all NfeEasy Domain objects easily:

```php
$invoice => Invoice::create([
    // attributes data
]);

$invoice->toArray(); // converts the domains objects into arrays

$invoice->toJson(); // converts the domains objects into a json string

(string)$invoice; // converts the domains objects into a json string

```

## Tests

NfeEasy uses [PHPUnit](https://phpunit.de) unit tests for better reliablility and security.

To run all tests, justs go to the project folder and type:

    $ phpunit