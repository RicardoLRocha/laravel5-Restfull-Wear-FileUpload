

<?php namespace App\Auth\Middleware;
// Cambiamos


use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;

class AuthenticateWithBasicAuth implements Middleware {

	/**
	* The Guard implementation.
	*
	* @var Guard
	*/
	protected $auth;

	/**
	* Create a new filter instance.
	*
	* @param  Guard  $auth
	* @return void
	*/
	public function __construct(Guard $auth){
		
		$this->auth = $auth;
	}

	/**
	* Handle an incoming request.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \Closure  $next
	* @return mixed
	*/
	public function handle($request, Closure $next){

		$fallo = $this->auth->onceBasic();

		if ($fallo) {
				
			return response()->json([
				'menssage' => "Failure of Authenticate",
				"error" => True
				], 404);
		}

		return $next($request);
	}

}
