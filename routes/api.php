<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::group(['prefix' => 'user', 'namespace' => 'Api\Auth'], function(){
		Route::post('register', 'UserController@register');
    	Route::post('login', 'UserController@login');
    	Route::post('logout', 'UserController@logout');
        Route::get('profile', 'UserController@profile')->middleware('auth:api');
        Route::post('update', 'UserController@updateUser');
        Route::post('password/email', 'ForgotPasswordController@updateUser');
        Route::post('change/password', 'ChangePasswordController')->middleware('auth:api');

        Route::post('/password/email', 'ForgotPasswordController@forgotPassword');
		Route::post('/password/reset', 'ResetPasswordController@reset');
		
		Route::get('/email/resend', 'VerificationController@resend')->name('verification.resend');
		Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
	});

	Route::group(['middleware' => 'auth:api', 'namespace' => 'Api\User'], function(){
		Route::resource('agencies', AgencyController::class);
		Route::resource('tones', ToneController::class);
		Route::resource('languages', LanguageController::class);
		Route::resource('agencies', AgencyController::class);
		Route::resource('agency-files', AgencyFileController::class);
		Route::resource('bonuses', BonusController::class);
		Route::resource('campaigns', CampaignController::class);
		Route::resource('reseller', ResellerController::class);
		Route::resource('scripts', ScriptController::class);
		Route::resource('tutorials', TutorialController::class);
		Route::resource('suggestions', SuggestionController::class);
		Route::resource('dashboard', DashboardController::class);
		Route::resource('script-types', ScriptTypeController::class);
		Route::resource('script-responses', ScriptResponseController::class);
		Route::resource('favorite-script-responses', FavoriteScriptController::class);
		Route::resource('flagged-script-responses', FlaggedScriptController::class);
		Route::resource('user-script-type-presets', UserScriptTypePresetController::class);
		Route::resource('script-type-presets', ScriptTypePresetController::class);
		Route::resource('platform-integrations', PlatformIntegrationController::class);
		Route::resource('marketplace', MarketplaceController::class);
		Route::resource('agency/{id}/campaign', AgencyCampaignController::class);
		Route::resource('marketplace-saved', MarketplaceProjectController::class);
		Route::get('user-select-script-type/{id}', 'UserSelectScriptTypeController@show');
		Route::resource('script-type-categories', ScriptTypeCategoryController::class);
		
	});

	Route::group([ 'prefix' => 'share', 'namespace' => 'Api\Share'], function(){
		Route::resource('plans', PlanController::class);
		Route::post('upload', 'UploadController@store')->middleware('auth:api');
	});

	Route::group(['prefix' => 'export', /*'middleware' => 'auth:api',*/ 'namespace' => 'Api\ExportImport'], function(){
		Route::get('/excel/model', 'ExportController@export');
		Route::get('/text/script-response/{id}', 'ExportController@downloadTextScriptResponse');
		Route::get('/text/download/all-script-responses/{id}', 'ExportController@downloadTextScript');
		Route::get('text/download/user/{id}/all-script-responses', 'ExportController@downloadUserTextScript');
	});

	// Route::group(['prefix' => 'admin', 'middleware' => 'auth:api', 'namespace' => 'Api\Admin'], function(){
	// 	Route::resource('plans', PlanController::class, array("as"=>"adminPlans"));
	// 	Route::resource('agencies', AgencyController::class, array("as"=>"adminAgencies"));
	// 	Route::resource('agency-files', AgencyFileController::class, array("as"=>"adminAgencyFiles"));
	// 	Route::resource('campaigns', CampaignController::class, array("as"=>"adminCampaigns"));
	// 	Route::resource('reseller', ResellerController::class, array("as"=>"adminResellers"));
	// 	// Route::resource('scripts', ScriptController::class, array("as"=>"adminScripts"));
	// 	Route::resource('roles', RoleController::class, array("as"=>"adminRoles"));
	// 	Route::resource('role', RoleController::class, array("as"=>"adminRole"));
	// 	Route::resource('script-type-attributes', ScriptTypeAttributeController::class, array("as"=>"adminScriptTypeAttribute"));
	// 	Route::resource('script-type', ScriptTypeController::class, array("as"=>"adminScriptType"));
	// 	Route::resource('suggestions', SuggestionController::class, array("as"=>"adminSuggestions"));
	// 	Route::resource('tutorials', TutorialController::class, array("as"=>"adminTutorials"));
	// 	Route::resource('users', UserController::class, array("as"=>"adminUsers"));
	// 	Route::resource('script-type-presets', ScriptTypePresetController::class, array("as"=>"adminScriptTypePrompts"));
	// 	Route::resource('transactions', TransactionController::class, array("as"=>"adminTransactions"));
	// 	Route::resource('bonuses', BonusController::class, array("as"=>"adminBonuses"));
	// 	Route::resource('third-party-platforms', ThirdPartyPlatformController::class, array("as"=>"adminThirdPartyPlatforms"));
	// 	Route::resource('dashboard', DashboardController::class, array("as"=>"adminDashboard"));
	// 	Route::resource('permissions', PermissionsController::class, array("as"=>"adminPermissions"));
	// 	Route::resource('flagged-scripts', FlaggedScriptController::class, array("as"=>"adminFlagged"));
	// 	Route::resource('script-type-categories', ScriptTypeCategoryController::class, array("as"=>"adminScriptTypeCategories"));
	// 	Route::resource('tones',ToneController::class, array("as"=>"adminTones"));
	// 	Route::resource('languages', LanguageController::class, array("as"=>"adminLanguages"));
	// 	Route::resource('freelancer-keyword', FreelanceKeywordController::class, array("as"=>"adminFreelanceKeyword"));
	// });

	Route::resource('script-test', Api\User\ScriptTestingController::class);
});

