<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29/03/2017
 * Time: 00:25
 */
namespace App\Middleware;

class GuestMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
        if($this->container->auth->check()){
            return $response->withRedirect($this->container->router->pathFor('home'));
        }
        $response= $next($request,$response);
        return $response;
    }
}