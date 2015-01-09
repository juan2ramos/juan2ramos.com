<?php


//Route::get('/', ['as' => 'home', 'uses' => 'homeController@index']);
Route::get('/', ['as' => 'home', function(){
    print_r(Menus::getMenu('principal'));
}]);

Route::get('juan', ['before' => 'permissions:updateUser','as' => 'homeTwo', function () {
    ddj(ACL::getPermissions(3));
}]);


