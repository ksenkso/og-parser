<?php
namespace app\tests;
use app\classes\OGParser;
require_once "../autoload.php";

$testOG = new TestOGParser(new OGParser());
$testOG->testYoutubeData();
$testOG->testClearingData();