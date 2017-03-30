<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29/03/2017
 * Time: 00:25
 */
namespace App\Middleware;

class AuthMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
        if (!$this->container->auth->check()){
            $this->container->flash->addMessage('error','Por favor loge para isto');
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }
        $response= $next($request,$response);
        return $response;
    }
}