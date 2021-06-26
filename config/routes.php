<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\System\Admin\IndexController@index');

Router::addGroup('/category', function () {
    Router::addRoute(['POST'], '/add', 'App\System\Admin\Controller\CategoryController@add');
    Router::addRoute(['GET'], '/info', 'App\System\Admin\Controller\CategoryController@info');
    Router::addRoute(['PUT'], '/update', 'App\System\Admin\Controller\CategoryController@update');
    Router::addRoute(['PUT'], '/updateSome', 'App\System\Admin\Controller\CategoryController@updateSome');
});
