<?php

namespace Bfgasparin\NFeEasy\Loader;

use Lightools\Xml\XmlLoader as BaseXmlLoader;

class XmlLoader
{
    /** @var Lightools\Xml\XmlLoader */
    private $loader;

    function __construct(BaseXmlLoader $loader)
    {
        $this->loader = $loader;
    }

    public function load(string $path)
    {
        return $this->loader->loadXml($path);
    }
}