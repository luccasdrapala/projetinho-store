<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('App\Controllers');

SimpleRouter::get('/product_types', 'ProductTypeController@index');
SimpleRouter::post('/product_types/create', 'ProductTypeController@createProductType');
SimpleRouter::post('/product_types/update/{id}', 'ProductTypeController@');
SimpleRouter::post('/product_types/delete/{id}', 'ProductTypeController@');

