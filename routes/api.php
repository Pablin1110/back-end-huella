<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Organizacions
    Route::apiResource('organizacions', 'OrganizacionApiController');

    // Alcanceunos
    Route::apiResource('alcanceunos', 'AlcanceunoApiController');

    // Alcancedos
    Route::apiResource('alcancedos', 'AlcancedosApiController');

    // Huellas
    Route::apiResource('huellas', 'HuellaApiController');
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
    //Organizaciones
 
    //Get
    Route::get('getAllOrganization', 'OrganizacionApiController@getAllOrganization');
    Route::get('getOrganizationxID/{id_usuario}', 'OrganizacionApiController@getOrganization');
    Route::get('getFootId/{usuario_id}', 'OrganizacionApiController@getFootId');
    //Post
    Route::post('postOrganization', 'OrganizacionApiController@storeOrganization');
    //Update
    Route::put('putOrganization/{id}', 'OrganizacionApiController@updateOrganization');
    //Delete
    Route::delete('deleteOrganization/{id}', 'OrganizacionApiController@deleteOrganization');
 
    //Alcance uno
    //Get
    Route::get('getAllScopeone', 'AlcanceunoApiController@getAllScopeone');
    Route::get('getScopeonexID/{usuario_id}', 'AlcanceunoApiController@getScopeone');
    Route::get('getScopeonexIDInfo/{usuario_id}', 'AlcanceunoApiController@getScopeoneInfo');
    Route::get('getSumScopeone/{usuario_id}', 'AlcanceunoApiController@getSumScopeone');
    //Post
    Route::post('postScopeone', 'AlcanceunoApiController@storeScopeone');
    //Update
    Route::put('putScopeone/{id}', 'AlcanceunoApiController@updateScopeone');
    //Delete
    Route::delete('deleteScopeone/{id}', 'AlcanceunoApiController@deleteScopeone');
    Route::delete('deleteAllScopeone/{id}', 'AlcanceunoApiController@deleteAllScopeone');

    //Alcance dos
    //Get
    Route::get('getAllScopetwo', 'AlcancedosApiController@getAllScopetwo');
    Route::get('getScopetwoxID/{usuario_id}', 'AlcancedosApiController@getScopetwo');
    Route::get('getScopetwoxIDInfo/{usuario_id}', 'AlcancedosApiController@getScopetwoInfo');
    Route::get('getSumScopetwo/{usuario_id}', 'AlcancedosApiController@getSumScopetwo');
    //Post
    Route::post('postScopetwo', 'AlcancedosApiController@storeScopetwo');
    //Update
    Route::put('putScopetwo/{id}', 'AlcancedosApiController@updateScopetwo');
    //Delete
    Route::delete('deleteScopetwo/{id}', 'AlcancedosApiController@deleteScopetwo');
    Route::delete('deleteAllScopetwo/{id}', 'AlcancedosApiController@deleteAllScopetwo');

    //Alcance huella
    //Get
    Route::get('getAllFoot', 'HuellaApiController@getAllFoot');
    Route::get('getFootxID/{usuario_id}', 'HuellaApiController@getFoot');
    Route::get('getFootID/{usuario_id}', 'HuellaApiController@getFootID');
    Route::get('getFootIDInfo/{usuario_id}', 'HuellaApiController@getFootIDInfo');
    Route::get('getScopeoneCarbon/{usuario_id}', 'HuellaApiController@getScopeoneCarbon');
    //Post
    Route::post('postFoot', 'HuellaApiController@storeFoot');
    //Update
    Route::put('putFoot/{id}', 'HuellaApiController@updateFoot');
    //Delete
    Route::delete('deleteFoot/{id}', 'HuellaApiController@deleteFoot');
    
    
 });
