<?php

Route::group(['namespace' => 'Sudip\Installer\Http\Controllers'], function () {

    Route::group(['middleware' => ['web'], 'as' => 'installer.'], function () {
        Route::get('install', 'InstallerController@index')->name('install');
        Route::get('server-requirements', 'InstallerController@requirements')->name('server-requirements');
        Route::get('file-permissions', 'InstallerController@permissions')->name('file-permissions');
        Route::get('database-setup', 'InstallerController@database')->name('database-setup');
        Route::post('database-setup', 'InstallerController@databaseSetup');
        Route::get('project-setup', 'InstallerController@project')->name('project-setup');
        Route::post('project-setup', 'InstallerController@projectSetup');
        Route::get('complete-setup', 'InstallerController@complete')->name('complete-setup');
    });
});
