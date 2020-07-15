<?php
/**
	ONSET Router Simple based on PHP

    The contents of this file are subject to the terms of the MIT License. 
    You may not use this file except in	compliance with the license. 
    Any of the license terms and conditions can be waived if 
    you get permission from the copyright holder.

	Copyright (c) 2020 ONSET org.
	Pukhovskyi Bohdan <bohdan.puhovskiy@gmail.com>

		@package Expansion
		@version 0.0.1 alfa
**/

namespace Basic;

class Router
{
    # Class Settings.
    private $passwd = "21232f297a57a5a743894a0e4a801fc3"; #admin // Used md5 encryption. 
    private $encryption = "md5"; //You can use different hash();
    private $handler = "handler()"; //If it's not file, he automatically start function handler() in Class.
    public $login_page = "genLogin()"; //Can be changed on file or 
    public $error = "Error: (404). Page don`t find."; //You can use file or text to Error handler.  
    
    # Class Routes.
    private $routes = array();

    # Add Route to Rouutes array.
    public function add($route = '/', $file = 'home.php') {
        array_push($this->routes, array($route => $file));
    }

    # Run Routing System
    public function run(){
        for ($i=0; $i < count($this->routes); $i++) { 
            foreach ($this->routes[$i] as $route => $file) {
                if($_SERVER['REQUEST_URI'] == $route){
                    (file_exists($file))? require_once $file : print $file;
                    $res = true;
                    die;
                }
                elseif($_SERVER['REQUEST_URI'] == '/handler'){
                    (file_exists($this->handler))? require $this->handler : $this->handler(); //require 'handler.php'; //$this->handler();
                    $res = true;
                    die;
                }
                elseif($_SERVER['REQUEST_URI'] != $route){
                    $res = false;
                }
            }
        }

        (!$res)? (file_exists($this->error))? require_once $this->error : print $this->error : die;
    }

    # Auth function
    public function auth($page){
        return (isset($_COOKIE['key']) && $_COOKIE['key'] == $this->passwd)? $page : $this->genLogin();
    }

    # Gen login page.
    private function genLogin(){
        setcookie('key', '');
        $login = $this->html('<input type="text" placeholder="Password" id="passwd"\><button type="button" onclick="sendPost();">Send</button>');
        $login = (file_exists($this->login_page))? $this->login_page : $login;
        return $login;
    }

    # Gen simple page with jQery Ajax POST requests.
    public function html($content){
        return '<!doctype html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Auth</title>
            <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        </head><body>'.$content.'<script type="text/javascript"> function sendPost(){$.post("/handler", { action : "auth();", passwd : $("input#passwd").val()}).done(function(data){location.reload();}); }</script></body></html>';
    }

    # Main Handler.
    private function handler(){
        (isset($_POST['passwd']))? setcookie('key', hash($this->encryption, $_POST['passwd'])) : print 'Error: null;';
        (isset($_POST['logout']))? setcookie('key', '') : print 'Error: null;';
    }

}

?>


