<?php

require_once __DIR__.'/vendor/autoload.php'; 
require_once __DIR__.'/CaptCha.php'; 

$app = new Silex\Application(); 

$app['debug'] = true;

$app->get('/api/v1/captcha', function() use($app) { 
	$captChaService = new CaptChaService();
	$captChaService->setRandomizer(new Randomizer());
    return $captChaService->getCaptcha()->toString();
    //return 'Hello';
}); 

$app->run(); 

?>