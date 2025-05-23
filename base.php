<?php

    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

    $url = $protocol.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];

    $b = parse_url($url);

    $base = $b['scheme'].'://'.$b['host'];

    function base($target) {
        include $GLOBALS['base'].'/'.$target;
    }

    function baseUrl($url) {
        return $GLOBALS['base'].'/'.$url;
    }

    function NotFound() {
        header('location: '.$GLOBALS['base'].'/NotFound.php');
    }
    
?>