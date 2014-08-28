<?php

session_start();

require_once 'vendor/autoload.php';

$appId      = '701642966587497';
$appSecret  = '63a99a4047998f8322c4978504f8dd1e';

Facebook\FacebookSession::setDefaultApplication($appId, $appSecret);
$facebook = new Facebook\FacebookRedirectLoginHelper('http://localhost/signInWithNokah/index.php');

try {
    if ($session = $facebook->getSessionFromRedirect()) {
            $_SESSION['facebook'] = $session->getToken();
            header('Location: index.php');        
    }
    
    if (isset($_SESSION['facebook'])) {
        $session = new Facebook\FacebookSession($_SESSION['facebook']);
        $request = new Facebook\FacebookRequest($session, 'GET', '/me');
        $request = $request->execute();
        
        $user = $request->getGraphObject()->asArray();
        
         print_r($user);
        
    }
    
    
} catch (Facebook\FacebookRequestException $e) {
    // when facebook returns an error
    
    
} catch (\Exception $e) {
    // a local session
}



