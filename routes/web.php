<?php

Route::redirect('/', '/atividades', 301);

Route::get('/atividades', 'AtividadesController@index');

Route::get('/atividades/{atividade}', 'AtividadesController@edit');