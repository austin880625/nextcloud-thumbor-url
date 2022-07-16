<?php
/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\ThumborUrl\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
    'routes' => [
       array(
           'name' => 'thumborurl_api#index',
           'url' => '/api/1.0/sign',
           'verb' => 'POST',
       ),
       array(
           'name' => 'thumborurl_api#save_settings',
           'url' => '/api/1.0/save_settings',
           'verb' => 'POST',
       ),
    ]
];
