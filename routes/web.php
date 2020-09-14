<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web'], 'namespace' => 'MOCSolutions\Core\Controllers', 'prefix' => '/core'], function () {
    Route::post('/filepond/upload/async', 'ArquivoController@uploadAsync')->name('core.filepond.upload.async');
    Route::delete('/filepond/upload/async', 'ArquivoController@deleteAsync')->name('core.filepond.delete.async');
});