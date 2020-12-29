<?php
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    Route::get('login','LoginController@index')->name('admin.login');
    Route::post('logins','LoginController@login')->name('admin.lg');

    Route::group(['middleware'=>['checkAdmin'],'as'=>'admin.'],function(){
        Route::get('index','indexController@index')->name('index');
        //oute::get('welcome','IndexController@welcome')->name('admin.welcome')->middleware(['checkAdmin']);
        Route::get('welcome','IndexController@welcome')->name('welcome');

        Route::get('logout','IndexController@logout')->name('logout');
        //用户列表
        Route::get('user/index','UserController@index')->name('user.index');

        //添加用户显示
        Route::get('/user/add','UserController@create')->name('user.create');
        //添加用户处理
        Route::post('/user/add','UserController@store')->name('user.store');

        Route::delete('user/del/{id}','UserController@del')->name('user.del');
        //还原用户restore
        Route::get('/user/restore/{id}','UserController@restore')->name('user.restore');
        //修改用户
        Route::get('user/edit/{id}','UserController@edit')->name('user.edit');
        //修改用户处理
        Route::put('user/edit/{id}','UserController@update')->name('user.edit');

        // 权限路由
        //分配权限
        Route::get('role/nod/{role}','RoleController@node')->name('role.node');
        //资源路由

        Route::resource('role','RoleController');


        //节点管理  权限管理
        Route::resource('node','NodeController');

    });
//    Route::get('index','indexController@index')->name('admin.index');
//    //oute::get('welcome','IndexController@welcome')->name('admin.welcome')->middleware(['checkAdmin']);
//    Route::get('welcome','IndexController@welcome')->name('admin.welcome');
//
//    Route::get('logout','IndexController@logout')->name('admin.logout');

});
