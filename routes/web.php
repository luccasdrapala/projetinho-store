<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('App\Controllers');

// rota padrão
SimpleRouter::get('/', 'SaleController@index');

SimpleRouter::get('/product_types', 'ProductTypeController@index');
SimpleRouter::post('/product_types/create', 'ProductTypeController@createProductType');
SimpleRouter::post('/product_types/update/{id}', 'ProductTypeController@updateProductType');
SimpleRouter::delete('/product_types/delete/{id}', 'ProductTypeController@deleteproductType');

SimpleRouter::get('/products', 'ProductController@index');
SimpleRouter::post('/products/create', 'ProductController@createProduct');
SimpleRouter::post('/products/update/{id}', 'ProductController@updateProduct');
SimpleRouter::delete('/products/delete/{id}', 'ProductController@deleteProduct');

SimpleRouter::get('/sales/getItems/{id}', 'SaleController@getItems');
SimpleRouter::post('/sales/create', 'SaleController@createSale');
SimpleRouter::delete('/sales/delete/{id}', 'SaleController@deleteSale');
SimpleRouter::delete('/sales/update/{id}', 'SaleController@updateSale');