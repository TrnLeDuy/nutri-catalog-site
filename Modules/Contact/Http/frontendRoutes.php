<?php

use Illuminate\Routing\Router;

$router->get('/', 'PublicController@createContact')->name('fe.contact.contact.create');
$router->post('/store', 'PublicController@storeContact')->name('fe.contact.contact.store');

