<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',

		/* =====================================================
		Utilizado cuando hacemos formularios con Laravel, en este caso es un REST 
		===================================================== */
		// 'App\Http\Middleware\VerifyCsrfToken',


		/** ===================================
			Para OUATH2
		=================================== */
		'LucaDegasperi\OAuth2Server\Middleware\OAuthExceptionHandlerMiddleware',
	];



	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'App\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		
		// indicar a mis controlladores que usaran este
		'auth.basic.once' => 'App\Http\Middleware\OnceAuth',
		
		/** ===================================
			Para OUATH2
		=================================== */
		'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',
 		'oauth' => '\LucaDegasperi\OAuth2Server\Middleware\OAuthMiddleware'

	];

}
