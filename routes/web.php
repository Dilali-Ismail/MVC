<?php

use Src\Http\Route ;
use App\controllers\HomeController;

Route::get('/',function(){
     echo 'hello';
});
Route::get('/home',[HomeController::class , 'index']);