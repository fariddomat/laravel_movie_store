<?php
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:super_admin|admin'])
    ->group(function () {
        Route::get('/dashboard', 'HomeController@index')->name('home');

        Route::resource('movies', 'MovieController');
        Route::resource('categories', 'CategoryController');
        Route::resource('countries', 'CountryController');
        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');

        Route::get('/statistic/month', 'StatisticController@statistic_by_month')->name('statistic.month');
        Route::get('/statistic/day', 'StatisticController@statistic_by_day')->name('statistic.day');
        Route::get('/statistic/user', 'StatisticController@statistic_by_user')->name('statistic.user');
        Route::get('/statistic/movie', 'StatisticController@statistic_by_movie')->name('statistic.movie');
        Route::get('/statistic/orders', 'StatisticController@order_statistics')->name('statistic.orders');


        Route::get('/settings/cover', 'SettingController@cover')->name('setting.cover');
        Route::post('/settings/change_cover', 'SettingController@change_cover')->name('setting.change_cover');

        Route::get('/settings/site_settings', 'SettingController@site_settings')->name('setting.site_settings');
        Route::get('/settings/social_links', 'SettingController@social_links')->name('setting.social_links');
        Route::post('/settings', 'SettingController@store')->name('settings.store');


        Route::get('/settings/reports', 'SettingController@reports')->name('settings.reports');
        Route::get('/settings/reportCheck/{id}', 'SettingController@reportCheck')->name('settings.reportCheck');

        Route::post('ban/{id}', 'UserController@ban')->name('users.ban');
        Route::post('unban/{id}', 'UserController@unban')->name('users.unban');
    });
