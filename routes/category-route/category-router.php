<?php

Route::get('create-category',[
   'uses'=>'CategoryController@create',
    'as'=>'create-category'
])->middleware('role');

Route::post('create-category',[
    'uses'=>'CategoryController@store',
    'as'=>'create-category'
]);

Route::get('categories',[
    'uses'=>'CategoryController@index',
    'as'=>'categories'
]);

Route::get('delete-category/{id}',[
    'uses'=>'CategoryController@delete',
    'as'=>'delete-category'
])->middleware('role');
Route::get('edit-category/{id}',[
    'uses'=>'CategoryController@edit',
    'as'=>'edit-category'
])->middleware('role');
Route::post('update-category',[
    'uses'=>'CategoryController@update',
    'as'=>'update-category'
])->middleware('role');
