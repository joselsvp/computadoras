<?php
if ( isset($_SERVER['DOCUMENT_ROOT']) && !empty($_SERVER['DOCUMENT_ROOT']) ) {
    define("base_url", $_SERVER['DOCUMENT_ROOT'] . '/');
} else {
    define("base_url", __DIR__ . '/');
}
define("controller_default", "productoController");
define("action_default", "index");
