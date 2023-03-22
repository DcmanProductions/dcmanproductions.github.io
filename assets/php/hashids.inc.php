<?php
require_once "values.inc.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/libraries/hashids/src/HashidsInterface.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/libraries/hashids/src/Hashids.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/libraries/hashids/src/Math/MathInterface.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/libraries/hashids/src/Math/BCMath.php";

use Hashids\Hashids;
$hashids = new Hashids($salt, 32);
