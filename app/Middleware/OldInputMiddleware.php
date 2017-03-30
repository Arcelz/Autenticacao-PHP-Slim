<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29/03/2017
 * Time: 00:25
 */
namespace App\Middleware;

class OldInputMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
        $this->container->view->getEnvironment()->addGlobal('old', $_SESSION['old']);
        $_SESSION['old'] = $request->getParams();
        $response = $next($request, $response);
        return $response;
    }
}