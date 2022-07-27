<?php

    $GLOBALS['base_url'] = "http://localhost/online_store/"; // base url of website
    $GLOBALS['doc_root'] = $_SERVER['DOCUMENT_ROOT'] . "/online_store/";
    function url($url) 
    {
        echo $GLOBALS['base_url'] . $url;
    }
    function getUrl($url) 
    {
        return $GLOBALS['base_url'] . $url;
    }

    function _include($url) { return $GLOBALS['doc_root'] . "includes/" . $url;}

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">


<link rel="stylesheet" href="<?php url('css/bootstrap.min.css') ?>" />
<link rel="icon" href="<?php url('images/icon.ico'); ?>">