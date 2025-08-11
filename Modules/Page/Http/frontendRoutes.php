<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->get('/', [
    'uses' => 'PublicController@homepage',
    'as' => 'homepage',
    'middleware' => config('asgard.page.config.middleware'),
]);

$router->get('/' . trans('page::pages.routes.blogs-prefix') . '/' . trans('page::pages.routes.search-prefix'), [
    'uses' => 'PublicController@search',
    'as' => 'blogs.search',
    'middleware' => config('asgard.page.config.middleware'),
]);

$router->get('/' . trans('page::pages.routes.category-prefix') . '/{slug}', [
    'uses' => 'PublicController@getBlogsByCategory',
    'as' => 'category.posts',
    'middleware' => config('asgard.page.config.middleware'),
]);

$router->any('/' . trans('page::pages.routes.blogs-prefix') . '/{uri}', [
    'uses' => 'PublicController@uri',
    'as' => 'post',
    'middleware' => config('asgard.page.config.middleware'),
]);

$router->any('{uri}', [
    'uses' => 'PublicController@uri',
    'as' => 'page',
    'middleware' => config('asgard.page.config.middleware'),
]);
