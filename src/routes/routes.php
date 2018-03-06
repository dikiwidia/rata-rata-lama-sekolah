<?php

Route::group(['prefix' => 'api/rr-lama-sekolah', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\RRLamaSekolah\Http\Controllers\RRLamaSekolahController@index',
        'create'    => 'Bantenprov\RRLamaSekolah\Http\Controllers\RRLamaSekolahController@create',
        'show'      => 'Bantenprov\RRLamaSekolah\Http\Controllers\RRLamaSekolahController@show',
        'store'     => 'Bantenprov\RRLamaSekolah\Http\Controllers\RRLamaSekolahController@store',
        'edit'      => 'Bantenprov\RRLamaSekolah\Http\Controllers\RRLamaSekolahController@edit',
        'update'    => 'Bantenprov\RRLamaSekolah\Http\Controllers\RRLamaSekolahController@update',
        'destroy'   => 'Bantenprov\RRLamaSekolah\Http\Controllers\RRLamaSekolahController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('rr-lama-sekolah.index');
    Route::get('/create',       $controllers->create)->name('rr-lama-sekolah.create');
    Route::get('/{id}',         $controllers->show)->name('rr-lama-sekolah.show');
    Route::post('/',            $controllers->store)->name('rr-lama-sekolah.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('rr-lama-sekolah.edit');
    Route::put('/{id}',         $controllers->update)->name('rr-lama-sekolah.update');
    Route::delete('/{id}',      $controllers->destroy)->name('rr-lama-sekolah.destroy');
});
