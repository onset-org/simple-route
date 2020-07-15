<?php

require_once 'router.php';
use Basic\Router;

// Create Router
$route = new Router();

$route->add('/', 'Home Page');  // Add new route with request '/' and print 'Home Page'.
$route->add('/data', $route->auth('Data Base')); // Add route with auth chacker.
// Add route with custom page.
$route->add('/admin', $route->auth('
<html lang="en"><head>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script></head><body><button onclick="sendPost();">Logout</button>
    <script type="text/javascript"> function sendPost(){$.post("/handler", { logout : true }).done(function(data){location.reload();}); }</script></body></html>
'));

// Start Routing
$route->run();

?>