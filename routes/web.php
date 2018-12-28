<?php

Route::redirect('/', '/atividades', 301);

Route::get('/atividades', 'AtividadesController@index');
Route::get('/atividades/edicao/{atividade?}', 'AtividadesController@edit');
Route::get('/atividades/save', 'AtividadesController@save');
