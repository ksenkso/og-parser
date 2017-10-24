<?php
namespace app;
use app\classes\OGParser;
require_once 'autoload.php';

$website_url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
if (!empty($website_url)) {
    $parser = new OGParser();
    $parser->setURL($website_url);
    $parser->parse();
    if (!$parser->hasErrors()) {
        /** @var array $data */
        $data = $parser->getData();
        ob_start();
        include "partials/results.php";
        echo ob_get_clean();
    }
}

