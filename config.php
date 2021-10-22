<?php

define("site_url", "http://localhost/Test/");

function dataClean($data = null) {
    $val = trim(stripslashes(htmlspecialchars($data)));
    return $val;
}

?>