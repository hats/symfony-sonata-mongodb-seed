<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);
function is_right_ip($startIp, $finishIp, $currentIp)
{
    $strIpToNum = function ($ip) {
        $val = explode('.', $ip);
        if (count($val) != 4) throw new Exception('В IP-адресе должно быть 4 октета!');
        if (
            ($val[0] < 0 OR $val[0] > 255) OR
            ($val[1] < 0 OR $val[1] > 255) OR
            ($val[2] < 0 OR $val[2] > 255) OR
            ($val[3] < 0 OR $val[3] > 255)
        ) throw new Exception('В октете могут быть числа в интервале 0..255!');
        return $val[0] * 256 * 256 * 256 + $val[1] * 256 * 256 + $val[2] * 256 + $val[3];
    };
    $startIp = $strIpToNum($startIp);
    $finishIp = $strIpToNum($finishIp);
    $currentIp = $strIpToNum($currentIp);

    if ($currentIp >= $startIp AND $currentIp <= $finishIp) return true;
    return false;
}

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || (
        (!in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1'))
            && !is_right_ip('192.168.0.1', '192.168.255.255', $_SERVER['REMOTE_ADDR']))
        || php_sapi_name() === 'cli-server'
    )
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
