<?php

Route::get('dr', function(){
    echo 'Hello from the DR package!';
});
Route::get('add/{a}/{b}', 'DevDr\Dr\CalculatorController@add');
