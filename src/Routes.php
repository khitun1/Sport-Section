<?php
namespace Framework;

Router::addRoute(new Route('data/{test_data}', 'MyController@index', Route::METHOD_GET));
Router::addRoute(new Route('data_values/{test_data}/value/{test_value}', 'MyController@index', Route::METHOD_GET));
Router::addRoute(new Route('welcome/{name}/text/{text}', 'HelloController@hello', Route::METHOD_GET));
echo "Маршруты добавлены<br>";