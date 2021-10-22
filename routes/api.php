<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::group(['prefix' => 'user', 'namespace' => 'Api\Auth'], function(){
		Route::post('register', 'UserController@register');
    	Route::post('login', 'UserController@login');
    	Route::post('logout', 'UserController@logout');
        Route::get('profile', 'UserController@profile')->middleware('auth:api');
        Route::post('update', 'UserController@updateUser');
        Route::post('update', 'ForgotPasswordController@updateUser');

		Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail');
		Route::post('/password/reset', 'ResetPasswordController@reset');
		
		Route::get('/email/resend', 'VerificationController@resend')->name('verification.resend');
		Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
	});

	Route::group(['middleware' => 'auth:api', 'namespace' => 'Api\User'], function(){
		Route::resource('agencies', AgencyController::class);
		Route::resource('campaigns', CampaignController::class);
		Route::resource('reseller', ResellerController::class);
		Route::resource('scripts', ScriptController::class);
		Route::resource('tutorials', TutorialController::class);
		Route::resource('suggestion', SuggestionController::class);
	});

	Route::group(['prefix' => 'admin', 'middleware' => 'auth:api', 'namespace' => 'Api\Admin'], function(){
		Route::resource('agencies', AgencyController::class, array("as"=>"adminAgencies"));
		Route::resource('attributes', AttributeController::class, array("as"=>"adminAttributes"));
		Route::resource('campaigns', CampaignController::class, array("as"=>"adminCampaigns"));
		Route::resource('reseller', ResellerController::class, array("as"=>"adminResellers"));
		Route::resource('scripts', ScriptController::class, array("as"=>"adminScripts"));
		Route::resource('roles', RoleController::class, array("as"=>"adminRoles"));
		Route::resource('script-type-attributes', ScriptTypeAttributeController::class, array("as"=>"adminScriptTypeAttribute"));
		Route::resource('script-type', ScriptTypeController::class, array("as"=>"adminScriptType"));
		Route::resource('script-type-questions', ScriptTypeQuestionController::class, array("as"=>"adminScriptTypeQuestion"));
		Route::resource('suggestions', SuggestionController::class, array("as"=>"adminSuggestions"));
		Route::resource('tutorials', TutorialController::class, array("as"=>"adminTutorials"));
		Route::resource('users', UserController::class, array("as"=>"adminUsers"));
	});

	Route::resource('script-test', Api\User\ScriptTestingController::class);
});

