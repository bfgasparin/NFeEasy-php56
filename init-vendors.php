<?php

if (!isset($illumateContractsPath)) {
    $illumateContractsPath = dirname(__FILE__).'/vendor/Illuminate/contracts';
}
if (!isset($illumateSupportPath)) {
  $illumateSupportPath = dirname(__FILE__).'/vendor/Illuminate/support';
}
if (!isset($lightoolsXmlPath)) {
  $lightoolsXmlPath = dirname(__FILE__).'/vendor/lightools/xml';
}

require("{$illumateContractsPath}/Support/Arrayable.php");
require("{$illumateContractsPath}/Support/Jsonable.php");

require("{$illumateSupportPath}/helpers.php");
require("{$illumateSupportPath}/Traits/Macroable.php");
require("{$illumateSupportPath}/Arr.php");
require("{$illumateSupportPath}/Collection.php");

require("{$lightoolsXmlPath}/src/Xml/XmlLoader.php");
require("{$lightoolsXmlPath}/src/Xml/XmlException.php");
